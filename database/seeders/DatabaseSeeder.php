<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Module;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create(['email' => 'dev@sams.com', 'role' => 'admin']);
        User::factory()->create(['email' => 'teacher@sams.com', 'role' => 'teacher']);
        User::factory()->create(['email' => 'student@sams.com', 'role' => 'student']);

        Student::factory(20)->create();
        Module::factory(10)->create();
    }
}
