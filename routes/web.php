<?php

use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\MyModulesController;
use App\Http\Controllers\Student\AttendanceController as StudentAttendanceController;
use App\Http\Controllers\Student\ClassesIndexController;
use App\Http\Controllers\Student\MedicalCertificateIndexController;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\ModulesIndexController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentMcController;
use App\Http\Controllers\TeacherController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    Route::get('/', DashboardController::class)->name('dashboard');
    Route::get('/modules', ModulesIndexController::class)->name('modules.index');
    Route::get('/classes', ClassesIndexController::class)->name('classes.index');
    Route::get('/attendance', [StudentAttendanceController::class, 'index'])->name('attendance.index');
    Route::post('/attendance/{module}', [StudentAttendanceController::class, 'store'])->name('attendance.store');

    Route::get('/medicalCertificate', [MedicalCertificateIndexController::class, 'index'])->name('medicalCertificate.index');
    Route::post('/medicalCertificate', [MedicalCertificateIndexController::class, 'store'])->name('medicalCertificate.store');

    Route::get('/profile', fn () => Inertia::render('Student/Profile/Index'))->name('profile.index');

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

    Route::get('my-modules', MyModulesController::class)->name('my-modules.index');

    Route::resource('modules', ModuleController::class);
    Route::resource('students', StudentController::class);
    Route::resource('teachers', TeacherController::class);
    Route::resource('enrollments', EnrollmentController::class);

    Route::get('/student_mc', StudentMcController::class)->name('student_mc.index');
    Route::get('attendances', [AttendanceController::class , 'index'])->name('attendances.index');
    Route::post('attendance/generate', [AttendanceController::class , 'generateAttendance'])->name('attendances.generate');
    Route::post('attendance/stop', [AttendanceController::class , 'stopAttendance'])->name('attendances.stop');

});

require __DIR__ . '/auth.php';
