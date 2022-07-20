<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'module_id',
        'attendance_taken_at'
    ];

    public function student() : BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function module() : BelongsTo
    {
        return $this->belongsTo(Module::class);
    }
}
