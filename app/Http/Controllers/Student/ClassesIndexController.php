<?php
namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ClassesIndexController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Student/Classes/Index');
    }
}
