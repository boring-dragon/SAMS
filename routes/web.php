<?php

use App\Http\Controllers\ModuleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Module;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::group(['middleware' => ['auth:sanctum', 'role:student'], 'prefix' => 'dashboard', 'as' => 'student.'], function () {
    Route::get('/', function () {
        return Inertia::render('Student/Dashboard');
    })->name('dashboard');
});


Route::group(['middleware' => ['auth:sanctum', 'role:teacher|admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('/', function () {
        return Inertia::render('Admin/Dashboard', [
            'total_students' => Student::count(),
            'total_teachers' => Teacher::count(),
            'total_modules' => Module::count(),
        ]);
    })->name('dashboard');


    Route::resource('modules', ModuleController::class);
    Route::resource('students', StudentController::class);
    Route::resource('teachers', TeacherController::class);
});

require __DIR__ . '/auth.php';
