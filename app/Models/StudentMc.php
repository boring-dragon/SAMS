<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMc extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'module_id',
        'reason',
        'class_date',
        'medical_file_url'
    ];
}
