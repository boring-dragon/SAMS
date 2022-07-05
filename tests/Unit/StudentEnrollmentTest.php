<?php

use App\Models\Module;
use App\Models\Student;

use function Pest\Laravel\actingAs;

test('A student can be enrolled into a module', function(){
    actingAs($this->admin);

    $student = Student::factory()->create();
    $module = Module::factory()->create();

    $module->enrollStudent($student);

    expect($module->students->count())->toBe(1);
    expect($module->students->first()->id)->toBe($student->id);
});

test('List of students can be enrolled into a module', function() {
    actingAs($this->admin);

    $students = Student::factory()->count(3)->create();

    $module = Module::factory()->create();

    $module->enrollStudents($students->pluck('id')->toArray());

    expect($module->students->count())->toBe(3);
});


test('A student can be removed from a module ', function() {
    actingAs($this->admin);

    $student = Student::factory()->create();
    $module = Module::factory()->create();

    $module->enrollStudent($student);

    expect($module->students()->count())->toBe(1);

    $module->removeStudent($student);

    expect($module->students()->count())->toBe(0);
});



test('List of students can be removed from a module', function() {
    actingAs($this->admin);

    $students = Student::factory()->count(3)->create();

    $module = Module::factory()->create();

    $module->enrollStudents($students->pluck('id')->toArray());

    expect($module->students()->count())->toBe(3);

    $module->removeStudents($students->pluck('id')->toArray());

    expect($module->students()->count())->toBe(0);
});
