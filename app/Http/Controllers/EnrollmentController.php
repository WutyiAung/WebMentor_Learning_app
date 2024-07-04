<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    //
    public function store(Request $request, Course $course)
    {
        $enrollment = new Enrollment();
        $enrollment->user_id = auth()->id();
        $enrollment->course_id = $course->id;
        $enrollment->save();

        return redirect()->route('courses.show', $course->id)->with('success', 'You have enrolled in this course');
    }
}
