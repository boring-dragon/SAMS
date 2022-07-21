<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\StudentMc;

class StudentMcController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return Inertia::render('Admin/StudentMc/Index', [
            'student_mcs' => StudentMc::with('module', 'student')->orderBy('updated_at', 'desc')->paginate(8),
        ]);
    }
}
