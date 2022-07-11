<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
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
            'enrollments' => Enrollment::orderBy('updated_at', 'desc')->paginate(8),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Enrollments/Create');
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
            'user' => 'required',
            'module' => 'required'
        ]);

        $enrollment = Enrollment::create($request->all());

        $user = User::create([
            'user' => 'required',
            'module' => 'required'
        ]);

        $enrollment->user()->save($user);

        return redirect()->route('admin.enrollments.index')->with('success', 'Enrollment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function show(Enrollment $enrollment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function edit(Enrollment $enrollment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enrollment $enrollment)
    {
        $request->validate([
            'module_id' => 'required',
            'student_id' => 'required',
            'enrolled_at' => 'required'
        ]);

        $enrollment->update($request->all());

        return back()->with('success', 'Enrollment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enrollment $enrollment)
    {
        //
    }
}
