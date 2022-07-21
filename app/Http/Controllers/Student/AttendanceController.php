<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index()
    {
      return Inertia::render('Student/Attendance/Index', [
        'attendances' => Auth::user()->typable->attendances()->with('student', 'module')->get()
      ]);
    }
    public function store(Request $request, Module $module)
    {
        $request->validate([
            'attendance_code' => 'required|string',
        ]);

        if($module->attendance_code !== $request->attendance_code) {
            return redirect()->back()->with('error', 'Invalid attendance code');
        }

        if($module->attendance()->where('student_id', auth()->user()->typable->id)->whereDate('attendance_taken_at', SupportCarbon::today())->first()) {
            return redirect()->back()->with('error', 'You have already taken attendance for this module');
        }

        $module->attendance()->create([
            'student_id' => auth()->user()->typable->id,
            'attendance_taken_at' => Carbon::now()
        ]);

        return back()->with('success', 'Attendance taken successfully.');
    }
}
