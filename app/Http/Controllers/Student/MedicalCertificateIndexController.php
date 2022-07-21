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

    public function store(Request $request): void
    {
        $request->validate([
            'module_id' => 'required|exists:modules,id',
            'reason' => 'required',
            'class_date' => 'required',
            'medical_file_url' => 'required',
        ]);

        auth()->user()->typable->student_mcs()->create($request->all());
    }
}
