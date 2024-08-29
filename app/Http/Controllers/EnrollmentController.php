<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    //
    public function index()
    {
        $enrollments = Enrollment::with(['user', 'course'])->get();
        return view('enrollments.index', compact('enrollments'));
    }

    public function create()
    {
        $users = \App\Models\User::all();
        $courses = \App\Models\Course::all();
        return view('enrollments.create', compact('users', 'courses'));
    }

    public function store(Request $request, Course $course)
    {
        
        $enrollment = new Enrollment();
        $enrollment->user_id = $request->user_id;
        $enrollment->course_id = $request->course_id;
        $enrollment->save();
        $enrollments = Enrollment::with(['user', 'course'])->get();

        return redirect()->route('enrollments.index', compact('enrollments'))->with('success', 'You have enrolled in this course');
    }

    public function edit(Enrollment $enrollment)
    {
        $users = User::all();
        $courses = Course::all();
        return view('enrollments.edit', compact('enrollment', 'users', 'courses'));
    }

    public function update(Request $request, Enrollment $enrollment)
    {
       
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        $enrollment->update($request->all());

        return redirect()->route('enrollments.index')
                         ->with('success', 'Enrollment updated successfully.');
    }

    public function unenroll(Course $course)
    {
        $course->enrollments()->detach(auth()->user()->id);
        return redirect()->back()->with('success', 'You have successfully unenrolled from the course.');
    }

    public function show(Enrollment $enrollment)
    {
        return view('enrollments.show', compact('enrollment'));
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();
        return redirect()->route('enrollments.index')
                         ->with('success', 'Enrollment deleted successfully.');
    }
}
