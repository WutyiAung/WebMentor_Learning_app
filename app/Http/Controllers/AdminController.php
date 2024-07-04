<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    function index(){
      $courses = Course::with('category')->paginate(5);
      return view('admin.index', compact('courses'));
    }
}
