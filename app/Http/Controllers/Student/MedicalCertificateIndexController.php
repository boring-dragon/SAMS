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
        # code...
    }
}
