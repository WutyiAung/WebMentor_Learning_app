<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::get('/about', function () {
    return view('home.about');
})->name('about');

Route::get('/paths', function () {
    return view('home.paths');
})->name('paths');


Route::get('/posts', function () {
    return view('home.posts');
})->name('posts');


Route::get('/contact', function () {
    return view('home.contact');
})->name('contact');

// public courses
Route::get('/public-courses', [CourseController::class, 'publicIndex'])->name('public.courses');
Route::get('/categories/{category}/courses', [CourseController::class, 'showCategoryCourses'])->name('category.courses');
Route::get('/public-courses/course/{id}', [CourseController::class, 'showDetails'])->name('courses.showDetails');

// built in
Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// show courses
Route::get('/courses', [CourseController::class, 'index'])->name('courses');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('courses', CourseController::class);
  // Categories CRUD routes
    Route::resource('categories', CategoryController::class);
});



// blogs
Route::middleware('auth')->group(function () {
    // Route to show a listing of blogs
    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');

    // Route to show the form for creating a new blog
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');

    // Route to store a newly created blog in storage
    Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');

    // Route to display a specific blog
    Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');

    // Route to show the form for editing a specific blog
    Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');

    // Route to update a specific blog in storage
    Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');
    Route::patch('/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');

    // Route to remove a specific blog from storage
    Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');
});

// blogCategory
Route::resource('blog_categories', BlogController::class);

// search
Route::get('/search', [SearchController::class, 'search'])->name('search');
 
