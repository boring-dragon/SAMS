<?php

namespace App\Models;

use App\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Carbon;

class Student extends Model
{
    use HasFactory;
    use Filterable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'profile_photo_url',
        'bio',
        'dob',
    ];

    protected $appends = [
        'full_name',
    ];

    public function user() : MorphOne
    {
        return $this->morphOne(User::class, 'typable', 'typable_type', 'typable_id', 'id');
    }

    public function modules() : BelongsToMany
    {
        return $this->belongsToMany(Module::class, 'enrollments', 'student_id', 'module_id')
            ->withTimestamps()
            ->withPivot('enrolled_at');
    }


    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }


    public function getAllOccuringClasses() : ?array
    {
        $currentlyOccuringModules = [];

        collect($this->modules)->each(function ($module, $key) use (&$currentlyOccuringModules) {

            collect($module->time_slots)->filter()->each(function ($timeSlot, $key) use (&$currentlyOccuringModules, $module) {
                $startTime = Carbon::parse($key.$timeSlot['start']);
                $endTime = Carbon::parse($key.$timeSlot['end']);
                $currentTime = Carbon::now();

                if ($currentTime->between($startTime, $endTime)) {
                    $currentlyOccuringModules[] = $module;
                }

            });
        });

        return $currentlyOccuringModules;
    }

    public function getUpComingClasses() : ?array
    {
        $upComingModules = [];


        collect($this->modules)->each(function ($module, $key) use (&$upComingModules) {

            collect($module->time_slots)->filter()->each(function ($timeSlot, $key) use (&$upComingModules, $module) {
                $startTime = Carbon::parse($key.$timeSlot['start']);
                $currentTime = Carbon::now();

                if ($currentTime->lt($startTime) && $startTime->diffInDays($currentTime) <= 7) {
                    $upComingModules[] = $module;
                }

            });
        });

        return $upComingModules;
    }
}
