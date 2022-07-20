<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class MedicalCertificateIndexController extends Controller
{
    public function __invoke() : \Inertia\Response
    {
        return Inertia::render('Student/MedicalCertificate/Index', [
            'modules' => auth()->user()->typable->modules,
        ]);
    }

}
