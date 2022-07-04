<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'module_code',
        'description',
        'teacher_id',
        'type',
    ];


    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
