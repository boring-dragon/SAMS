<?php

use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Student\ClassesIndexController;
use App\Http\Controllers\Student\ModulesIndexController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Module;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::group(['middleware' => ['auth:sanctum', 'role:student'], 'prefix' => 'dashboard', 'as' => 'student.'], function () {

    Route::get('/', fn () => Inertia::render('Student/Dashboard'))->name('dashboard');
    Route::get('/modules', ModulesIndexController::class)->name('modules.index');
    Route::get('/classes', ClassesIndexController::class)->name('classes.index');
    Route::get('/attendance', fn () => Inertia::render('Student/Attendance/Index'))->name('attendance.index');
});


Route::group(['middleware' => ['auth:sanctum', 'role:teacher|admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('/', function () {
        return Inertia::render('Admin/Dashboard', [
            'total_students' => Student::count(),
            'students_today' => Student::whereDate('created_at', today())->count(),
            'modules_today' => Module::whereDate('created_at', today())->count(),
            'total_teachers' => Teacher::count(),
            'total_modules' => Module::count(),
        ]);
    })->name('dashboard');

    Route::resource('modules', ModuleController::class);
    Route::resource('students', StudentController::class);
    Route::resource('teachers', TeacherController::class);
    Route::resource('enrollments', EnrollmentController::class);
    Route::resource('attendances', AttendanceController::class);
});

require __DIR__ . '/auth.php';
