<?php

use App\Models\Module;

use function Pest\Laravel\actingAs;

test('A student can be enrolled into a module', function(){
    actingAs($this->student->user);

    $module = Module::factory()->create();

    $module->enrollStudent($this->student);

    expect($module->students->count())->toBe(1);
    expect($module->students->first()->id)->toBe($this->student->id);
});
