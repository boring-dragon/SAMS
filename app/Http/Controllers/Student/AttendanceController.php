<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AttendanceController extends Controller
{
    public function index()
    {
      return Inertia::render('Student/Attendance/Index');
    }
    public function store(Request $request, Module $module): void
    {
        $request->validate([
            'attendance_code' => 'required|string|size:6',
        ]);
        $module->attendance()->create([
            'student_id' => auth()->id(),
            'attendance_taken_at' => now(),
            'attendance_code' => $request->attendance_code,
        ]);
    }
}
