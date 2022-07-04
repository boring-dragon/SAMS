<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Module;
use App\Models\Teacher;

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

        $student = Student::factory()->create();
        User::factory()->forModel($student)->create(['email' => 'student@sams.com', 'role' => 'student']);

        $teacher = Teacher::factory()->create();
        User::factory()->forModel($teacher)->create(['email' => 'teacher@sams.com', 'role' => 'teacher']);


        Module::factory(10)->create();
    }
}
