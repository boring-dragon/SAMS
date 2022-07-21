<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

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

    protected $appends = [
        'medical_file_url_path',
    ];

    public function getMedicalFileUrlPathAttribute()
    {
        return Storage::url($this->medical_file_url);
    }

    public function student() : BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }


}
