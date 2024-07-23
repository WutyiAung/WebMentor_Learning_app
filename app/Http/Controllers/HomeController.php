<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{ 
    public function index() {
        $categories = Category::inRandomOrder()->limit(8)->get();
        return view('home.index', compact('categories'));
    }
}
