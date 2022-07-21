<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function show()
    {
        return Inertia::render('Student/Profile/Show', [
            'student' => Auth::user()->typable
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'bio' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:6',
        ]);

        if($request->has('password')) {
            Auth::user()->update([
                'password' => Hash::make($request->password),
            ]);
        }

        Auth::user()->typable->update([
            'bio' => $request->bio,
        ]);

        return redirect()->route('student.profile.show')->with('success', 'Profile updated successfully.');
    }
}
