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

        ]);
    }

    public function generate(Module $module)
    {
        $module->generateAttendance();

        return redirect()->route('admin.attendances.index');
    }


}
