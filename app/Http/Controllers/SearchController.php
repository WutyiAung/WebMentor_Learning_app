<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Course;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $blogs = Blog::where('title', 'like', "%{$query}%")
                ->orWhere('content', 'like', "%{$query}%")
                ->with('category')
                ->paginate(10, ['*'], 'blogs_page');

            $courses = Course::where('title', 'like', "%{$query}%")
                ->orWhere('description', 'like', "%{$query}%")
                ->with('category')
                ->paginate(10, ['*'], 'courses_page');
        } else {
            $blogs = collect();
            $courses = collect();
        }

        return view('search_results', compact('query', 'blogs', 'courses'));
    }
}
