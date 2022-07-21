<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MedicalCertificateIndexController extends Controller
{
    public function index()
    {
        return Inertia::render('Student/MedicalCertificate/Index', [
            'modules' => auth()->user()->typable->modules,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'module_id' => 'required|exists:modules,id',
            'reason' => 'required',
            'class_date' => 'required',
            'mc' => 'required',
        ]);



       auth()->user()->typable->student_mcs()->create([
            'module_id' => $request->module_id,
            'reason' => $request->reason,
            'class_date' => $request->class_date,
            'medical_file_url' => $request->mc->store('student_mcs', 'public'),
        ]);

        return redirect()->route('student.dashboard')->with('success', 'Medical certificate created successfully.');
    }
}
