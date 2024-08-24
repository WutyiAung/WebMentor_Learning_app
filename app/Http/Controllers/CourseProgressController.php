<?php
namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseProgress;
use Illuminate\Http\Request;

class CourseProgressController extends Controller
{
    public function updateProgress(Request $request, Course $course)
    {
        $user = auth()->user();
        $progress = $request->input('progress'); // Progress percentage (0-100)

       CourseProgress::updateOrCreate(
            ['user_id' => $user->id, 'course_id' => $course->id],
            ['progress' => $progress]
        );

        return response()->json(['message' => 'Progress updated successfully.']);
    }
}
