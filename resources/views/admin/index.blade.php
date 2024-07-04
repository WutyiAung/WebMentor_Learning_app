<!-- resources/views/dashboard.blade.php -->

<x-admin-layout>
    <main>
        <div class="container-fluid px-4">
            {{-- <h1 class="mt-4">Dashboard</h1> --}}
            <ol class="breadcrumb my-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>

            <!-- Dashboard Cards -->
            <div class="row">
                <!-- Courses Section -->
                <div class="col-xl-6 col-md-6">
                    <div class="card bg-light text-dark mb-4">
                        <div class="card-body">
                            <h5>Courses</h5>
                            <p>Manage your courses.</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a class="btn btn-primary btn-sm" href="{{ route('courses.index') }}">View Courses</a>
                            <a class="btn btn-primary btn-sm" href="{{ route('courses.create') }}">Create Course</a>
                        </div>
                    </div>
                </div>

                <!-- Blogs Section -->
                <div class="col-xl-6 col-md-6">
                    <div class="card bg-light text-dark mb-4">
                        <div class="card-body">
                            <h5>Blogs</h5>
                            <p>Manage your blogs.</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a class="btn btn-success btn-sm" href="{{ route('blogs.index') }}">View Blogs</a>
                            <a class="btn btn-success btn-sm" href="{{ route('blogs.create') }}">Create Blog</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Sections (Optional) -->
            <div class="row">
                <!-- Blog Categories Section -->
                <div class="col-xl-6 col-md-6">
                    <div class="card bg-light text-dark mb-4">
                        <div class="card-body">
                            <h5>Blog Categories</h5>
                            <p>Manage your blog categories.</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a class="btn btn-warning btn-sm" href="{{ route('blog_categories.index') }}">View Blog Categories</a>
                            <a class="btn btn-warning btn-sm" href="{{ route('blog_categories.create') }}">Create Blog Category</a>
                        </div>
                    </div>
                </div>

                <!-- Course Categories Section -->
                <div class="col-xl-6 col-md-6">
                    <div class="card bg-light text-dark mb-4">
                        <div class="card-body">
                            <h5>Course Categories</h5>
                            <p>Manage your course categories.</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a class="btn btn-info btn-sm" href="{{ route('categories.index') }}">View Course Categories</a>
                            <a class="btn btn-info btn-sm" href="{{ route('categories.create') }}">Create Course Category</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-admin-layout>
