<?php
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\IsStudent;
use App\Models\BlogCategory;
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


Route::get('/posts', [BlogController::class,'publicIndex'])->name('posts');
Route::get('/blogs/{id}', [BlogController::class, 'publicShow'])->name('public.blogs.show');


Route::get('/contact', function () {
    return view('home.contact');
})->name('contact');

// public courses
Route::get('/public-courses', [CourseController::class, 'publicIndex'])->name('public.courses');
Route::get('/categories/{category}/courses', [CourseController::class, 'showCategoryCourses'])->name('category.courses');
Route::get('/public-courses/course/{id}', [CourseController::class, 'showDetails'])->name('courses.showDetails');

// built in
Route::get('/dashboard', [AdminController::class, 'index'])->middleware(AdminMiddleware::class)->name('dashboard');

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

    Route::resource('blogs',BlogController::class);
})->middleware(AdminMiddleware::class);



// blogs
Route::middleware('auth')->group(function () {
    // Route to show a listing of blogs
   
});

// blogCategory
Route::resource('blog_categories', BlogController::class);

// search
Route::get('/search', [SearchController::class, 'search'])->name('search');

// Student
$studentMiddleware = IsStudent::class;
Route::middleware(['auth', $studentMiddleware])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::get('/student/profile', [StudentController::class, 'profile'])->name('student.profile');
    Route::patch('/student/profile', [StudentController::class, 'updateProfile'])->name('student.updateProfile');
});

Route::middleware('auth')->group(function () {
    Route::post('/courses/{course}/enroll', [CourseController::class, 'enroll'])->name('courses.enroll');
});
