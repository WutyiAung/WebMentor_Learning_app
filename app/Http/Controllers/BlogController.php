<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    // Constructor to apply middleware
    
    // Display a listing of the resource
    public function index()
    {
        $blogs = Blog::with('category')->paginate(10);
        return view('blogs.index', compact('blogs'));
    }

    public function publicIndex(Request $request)
    {
        $search = $request->query('search');

        if ($search) {
            $blogs = Blog::where('title', 'like', '%' . $search . '%')
                          ->orWhere('content', 'like', '%' . $search . '%')
                          ->paginate(5);
        } else {
            $blogs = Blog::latest()->paginate(6);
        }
        return view('home.posts', compact('blogs'));
    }

    public function publicShow($id)
    {
        $blog = Blog::findOrFail($id);
        return view('home.show_blog', compact('blog'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        $categories = Category::all();
        return view('blogs.create', compact('categories'));
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'nullable|string|max:255',
            'blog_category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        $data['user_id'] = Auth::id(); // Assign the current user as the blog author

        Blog::create($data);

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }


    // Show the form for editing the specified resource
    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    // Update the specified resource in storage
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'author' => 'nullable|string',
            'blog_category_id' => 'nullable|exists:blog_categories,id',
            'image' => 'nullable|image|max:2048'
        ]);

        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->author = $request->input('author');
        $blog->blog_category_id = $request->input('blog_category_id');

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($blog->image) {
                Storage::delete($blog->image);
            }
            $blog->image = $request->file('image')->store('blogs');
        }

        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy(Blog $blog)
    {
        // Delete the image if exists
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
