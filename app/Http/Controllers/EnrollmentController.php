<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Module;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Inertia\Inertia;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Admin/Enrollments/Index', [
            'enrollments' => Enrollment::with('student', 'module')->orderBy('updated_at', 'desc')->paginate(8),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Enrollments/Create', [
            'modules' => Module::all(),
            'students' => Student::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'module_id' => 'required|exists:modules,id',
            'student_id' => 'required|exists:students,id',
        ]);

        Enrollment::create([
            'module_id' => $request->module_id,
            'student_id' => $request->student_id,
            'enrolled_at' => Carbon::now()
        ]);

        return redirect()->route('admin.enrollments.index')->with('success', 'Enrollment created successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();

        return redirect()->route('admin.enrollments.index')->with('success', 'Enrollment deleted successfully');
    }
}
