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
            'modules' => Auth::user()->typable->modules
        ]);
    }

    public function generateAttendance(Module $module)
    {
        $module->generateAttendance();

        return redirect()->route('admin.attendances.index');
    }

    public function stopAttendance(Module $module)
    {
        $module->stopAttendance();

        return redirect()->route('admin.attendances.index');
    }


}
