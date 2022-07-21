<?php

namespace App\Models;

use App\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use chillerlan\QRCode\QRCode;

class Module extends Model
{
    use HasFactory;
    use Filterable;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'module_code',
        'description',
        'teacher_id',
        'type',
        'time_slots',
        'attendance_code',
        'attendance_generated_at',
    ];

    protected $casts = [
        'time_slots' => 'array',
    ];

    protected $appends = [
        'qr_code'
    ];


    public function getQrCodeAttribute()
    {
        if ($this->attendance_code && $this->attendance_generated_at) {
            return (new QRCode)->render($this->attendance_code);
        }

        return null;
    }


    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'enrollments', 'module_id', 'student_id')
            ->withTimestamps()
            ->withPivot('enrolled_at');
    }

    public function attendance(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function student_mcs(): HasMany
    {
        return $this->hasMany(StudentMc::class);
    }

    public function enrollStudents(array $student_ids): void
    {
        $this->students()->syncWithPivotValues($student_ids, [
            'enrolled_at' => Carbon::now(),
        ]);
    }

    public function enrollStudent(Student $student): void
    {
        $this->students()->attach($student->id, [
            'enrolled_at' => Carbon::now(),
        ]);
    }

    public function generateAttendance(): void
    {
        $this->update([
            'attendance_generated_at' => Carbon::now(),
            'attendance_code' => Str::random(5),
        ]);
    }

    public function stopAttendanceCode(): void
    {
        $this->update([
            'attendance_generated_at' => null,
            'attendance_code' => null,
        ]);
    }

    public function removeStudent(Student $student): bool
    {
        return $this->students()->detach($student->id);
    }

    public function removeStudents(array $student_ids): bool
    {
        return $this->students()->detach($student_ids);
    }
}
