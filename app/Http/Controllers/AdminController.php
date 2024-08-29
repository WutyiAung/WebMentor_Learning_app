<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        $courses = Course::with('category')->paginate(5);
        $totalCourses = Course::count();
        $totalUsers = User::count();  
        $totalBlogs = Blog::count();
        $totalCategories = Category::count();
        $totalEnrollments = Enrollment::count(); // Add this line to count total enrollments

        return view('admin.index', compact('courses', 'totalCourses', 'totalUsers', 'totalBlogs', 'totalCategories', 'totalEnrollments'));
    }
}
