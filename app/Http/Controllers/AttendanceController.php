<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Admin/Attendance/Index', [
            'modules' => Auth::user()->typable->modules,
            'generated_attendances' => Auth::user()->typable
                ->modules()
                ->whereNotNull('attendance_code')
                ->whereNotNull('attendance_generated_at')->get(),
        ]);
    }

    public function generateAttendance(Request $request)
    {

        $module = Module::findOrFail($request->module_id);
        $module->generateAttendance();

        return redirect()->route('admin.attendances.index')->with('success', 'Attendance generated successfully');
    }

    public function stopAttendance(Request $request)
    {
        $module = Module::findOrFail($request->module_id);
        $module->stopAttendanceCode();

        return redirect()->route('admin.attendances.index')->with('success', 'Attendance stopped successfully');
    }
}
