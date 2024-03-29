<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Module>
 */
class ModuleFactory extends Factory
{

    protected $model = \App\Models\Module::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->domainWord(),
            'module_code' => $this->faker->unique()->numberBetween(1000, 9999),
            'description' => $this->faker->text(),
            'type' => $this->faker->randomElement(['core', 'practical', 'tutorial']),
            'time_slots' => [
                "sunday" => [
                    [
                    "start" => "09:00",
                    "end" => "11:00"
                    ]
                ],
                "tuesday" => [
                    [
                    "start" => "10:00",
                    "end" => "11:00"
                    ]
                ],
                "friday" => [
                    [
                    "start" => "05:00",
                    "end" => "07:00"
                    ]
                ],
            ]
        ];
    }
}
