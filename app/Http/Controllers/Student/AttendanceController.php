<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AttendanceController extends Controller
{
    public function index()
    {
      return Inertia::render('Student/Attendance/Index');
    }
    public function store(Request $request, Module $module)
    {
        $request->validate([
            'attendance_code' => 'required|string|size:6',
        ]);

        if($module->attendance_code !== $request->attendance_code) {
            return redirect()->back()->with('error', 'Invalid attendance code');
        }

        $module->attendance()->create([
            'student_id' => auth()->id(),
            'attendance_taken_at' => Carbon::now()
        ]);

        return back()->with('success', 'Attendance taken successfully.');
    }
}
