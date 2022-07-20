<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AttendanceController extends Controller
{
    public function index()
    {
      return Inertia::render('Student/Attendance/Index');
    }
    public function store(): void
    {
        # code...
    }
}
