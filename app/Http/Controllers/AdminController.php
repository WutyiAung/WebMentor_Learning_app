<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    function index(){
      $courses = Course::with('category')->paginate(5);
      $totalCourses = Course::count();
      $totalUsers = User::count();  
      $totalBlogs = Blog::count();
      $totalCategories = Category::count();
      return view('admin.index', compact('courses','totalCourses','totalUsers','totalBlogs','totalCategories'));
    }
}
