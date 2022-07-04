<?php

namespace App\Models;

use App\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

class Module extends Model
{
    use HasFactory;
    use Filterable;

    protected $fillable = [
        'name',
        'module_code',
        'description',
        'teacher_id',
        'type',
    ];


    public function teacher() : BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function students() : BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'enrollments', 'module_id', 'student_id');
    }

    public function enrollStudents(array $students) : void
    {
        $this->students()->syncWithPivotValues($students, [
            'enrolled_at' => Carbon::now(),
        ]);
    }

    public function enrollStudent(Student $student) : void
    {
        $this->students()->attach($student->id, [
            'enrolled_at' => Carbon::now(),
        ]);
    }
}
