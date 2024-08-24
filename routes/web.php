<?php
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsStudent;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class , 'index'])->name('home');

Route::get('/about', function () {
    return view('home.about');
})->name('about');

Route::get('/paths', function () {
    return view('home.paths');
})->name('paths');

Route::get('/contact', function () {
    return view('home.contact');
})->name('contact');

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

Route::prefix('admin')->group(function () {
    Route::resource('courses', CourseController::class);
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

Route::post('/blogs/{blog}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::post('/courses/{course}/comments', [CommentController::class, 'storeCourse'])->name('courses.comments.store');
Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::post('/comments/{comment}/react', [CommentController::class, 'react'])->name('comments.react');
Route::post('/comments/{comment}/replies', [CommentController::class, 'storeReply'])->name('replies.store');
Route::delete('replies/{reply}', [CommentController::class, 'destroyReply'])->name('replies.destroy'); 

// mail
Route::post('/send-message', [ContactController::class, 'send'])->name('contact.send');
// User
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::post('/subscribe', [SubscriptionController::class, 'store'])->name('subscribe');

// In your routes/web.php
Route::post('/courses/{course}/unenroll', [EnrollmentController::class, 'unenroll'])->name('courses.unenroll');
Route::post('/courses/{course}/progress', [CourseController::class, 'updateProgress'])->name('courses.progress');

