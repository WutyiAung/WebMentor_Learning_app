<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Show the student dashboard.
     */
    public function dashboard()
    {
        $user = Auth::user();
        $courses = $user->courses; 
        $enrollments = $user->enrollments;
        return view('student.dashboard', compact('user', 'courses','enrollments'));
    }

    /**
     * Show the student profile.
     */
    // public function profile()
    // {
    //     $user = Auth::user();
    //     return view('student.profile', compact('user'));
    // }

    /**
     * Update the student profile.
     */
    
}
