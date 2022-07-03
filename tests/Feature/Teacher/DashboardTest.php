<?php

use function Pest\Laravel\actingAs;

it('A teacher can view the teacher dashboard', function(){
    actingAs($this->teacher);

    $this->get(route('admin.dashboard'))
        ->assertStatus(200);
});
