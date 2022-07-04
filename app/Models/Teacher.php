<?php

namespace App\Models;

use App\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
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
    ];

    protected $appends = [
        'full_name',
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
