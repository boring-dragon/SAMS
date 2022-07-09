<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClassesIndexController extends Controller
{
    public function __invoke(Request $request) : \Inertia\Response
    {

        if ($request->has('filter') && $request->filter == 'upcoming') {
            $classes = auth()->user()
                ->typable
                ->getUpComingClasses()
                ->sortBy('at')
                ->values();
        } else {
            $classes = auth()->user()->typable->getAllOccuringClasses();
        }
        return Inertia::render('Student/Classes/Index', [
            'classes' => $classes
        ]);
    }
}
