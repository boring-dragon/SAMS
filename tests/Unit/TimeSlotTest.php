<?php
use App\Models\Module;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use function Spatie\PestPluginTestTime\testTime;

use function Pest\Laravel\actingAs;
use Illuminate\Foundation\Testing\Concerns\InteractsWithTime;

test('A Student can get the currently occuring classes', function() {
    actingAs($this->student->user);

   $this->travelTo('2022-07-10 9:34:56');

    $modules = Module::factory(3)->state([
        'time_slots' => [
            "sunday" => [
                "start" => "09:00",
                "end" => "11:00"
            ],
            "tuesday" => [
                "start" => "10:00",
                "end" => "11:00"
            ],
            "friday" => [
                "start" => "05:00",
                "end" => "07:00"
            ],
        ]
    ])->create();

    $modules->each(function($module) {
        $module->enrollStudent($this->student);
    });


    $modules = Module::factory(3)->state([
        'time_slots' => [
            "tuesday" => [
                "start" => "10:00",
                "end" => "11:00"
            ],
            "friday" => [
                "start" => "05:00",
                "end" => "07:00"
            ],
        ]
    ])->create();

    $modules->each(function($module) {
        $module->enrollStudent($this->student);
    });

    expect($this->student->modules()->count())->toBe(6);
    expect(count(Auth::user()->typable->getAllOccuringClasses()))->toBe(3);
});


test('A student can get the upcoming classes', function() {
    actingAs($this->student->user);

    $this->travelTo('2022-07-10 9:34:56');

    $modules = Module::factory(3)->state([
        'time_slots' => [
            "sunday" => [
                "start" => "09:00",
                "end" => "11:00"
            ],
            "tuesday" => [
                "start" => "10:00",
                "end" => "11:00"
            ],
            "friday" => [
                "start" => "05:00",
                "end" => "07:00"
            ],
        ]
    ])->create();

    $modules->each(function($module) {
        $module->enrollStudent($this->student);
    });

    $modules = Module::factory(3)->state([
        'time_slots' => [
            "tuesday" => [
                "start" => "10:00",
                "end" => "11:00"
            ],
            "friday" => [
                "start" => "05:00",
                "end" => "07:00"
            ],
        ]
    ])->create();

    $modules->each(function($module) {
        $module->enrollStudent($this->student);
    });

    expect($this->student->modules->count())->toBe(6);

    expect(count(Auth::user()->typable->getUpcomingClasses()))->toBe(12);
});
