<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::paginate(10);
        return view('blog_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('blog_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        BlogCategory::create($request->all());
        return redirect()->route('blog_categories.index');
    }

    public function edit(BlogCategory $blogCategory)
    {
        return view('blog_categories.edit', compact('blogCategory'));
    }

    public function update(Request $request, BlogCategory $blogCategory)
    {
        $request->validate(['name' => 'required']);
        $blogCategory->update($request->all());
        return redirect()->route('blog_categories.index');
    }

    public function destroy(BlogCategory $blogCategory)
    {
        $blogCategory->delete();
        return redirect()->route('blog_categories.index');
    }
}
