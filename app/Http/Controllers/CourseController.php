<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    //
    public function publicIndex(Request $request)
    {
        $query = $request->input('query');
        $categoryId = $request->input('category_id');
    
        // Start building the query
        $courses = Course::query();
    
        // If a search query is provided, filter courses by title or description
        if ($query) {
            $courses->where(function ($q) use ($query) {
                $q->where('title', 'like', '%' . $query . '%')
                  ->orWhere('description', 'like', '%' . $query . '%');
            });
        }
    
        // If a category ID is provided, filter courses by category
        if ($categoryId) {
            $courses->where('category_id', $categoryId);
        }
    
        // Get the filtered courses
        $courses = $courses->latest()->paginate(6);
    
        // Get all categories for the dropdown
        $categories = Category::all();
    
        // Return view with courses and categories
        return view('home.courses', compact('courses', 'categories'));
    }
    
    
    
   public function index()
    {
        $courses = Course::with('category')->latest()->paginate(10);
        return view('admin.courses', compact('courses'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'url' => 'required|url',
            'source' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'youtube_playlist_id' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $course = new Course($request->all());
    
        if ($request->hasFile('image')) {
            $course->image = $request->file('image')->store('courses', 'public');
        }
    
        $course->save();
        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }
    
    
     public function showDetails($id)
        {
            $course = Course::findOrFail($id);
            $relatedCourses = Course::where('category_id', $course->category_id)
                                    ->where('id', '!=', $course->id)
                                    ->take(5)
                                    ->get();
        
            return view('home.course_details',compact('course','relatedCourses'));
        }

    public function show(Course $course)
    {
        return view('admin.show', compact('course'));
    }

    public function edit(Course $course)
    {   
        $categories = Category::all();
        return view('admin.edit', compact('course','categories'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'url' => 'required|url',
            'source' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'youtube_playlist_id' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $course->fill($request->all());
    
        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($course->image) {
                Storage::disk('public')->delete($course->image);
            }
            $course->image = $request->file('image')->store('courses', 'public');
        }
    
        $course->save();
    
        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }
    
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }

    public function enroll(Request $request, Course $course)
    {
        // Check if the user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You need to be logged in to enroll in a course.');
        }

        $user = auth()->user();

        // Check if the user is already enrolled in the course
        if (Enrollment::where('user_id', $user->id)->where('course_id', $course->id)->exists()) {
            return redirect()->route('courses.showDetails', $course->id)->with('info', 'You are already enrolled in this course.');
        }

        // Enroll the user in the course
        Enrollment::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
        ]);

        return redirect()->route('courses.showDetails', $course->id)->with('success', 'You have successfully enrolled in the course!');
    }

}
