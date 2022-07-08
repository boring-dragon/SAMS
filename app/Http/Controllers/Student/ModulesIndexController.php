<?php
namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ModulesIndexController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Student/Modules/Index', [
            'modules' => auth()->user()->typable->modules,
        ]);
    }
}
