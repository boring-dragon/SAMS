<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

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
    }
}
