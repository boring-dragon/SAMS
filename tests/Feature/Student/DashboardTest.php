<?php

use function Pest\Laravel\actingAs;

it('A student can view the student dashboard', function(){
    actingAs($this->student);

    $this->get(route('student.dashboard'))
        ->assertStatus(200);
});
