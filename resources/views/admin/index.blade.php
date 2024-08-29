<x-admin-layout>
    <main>
        <div class="container-fluid px-4">
            <ol class="breadcrumb my-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>

            <!-- Dashboard Cards -->
            <div class="row g-4">
                <!-- Total Courses Section -->
                <div class="col-md-6 col-xl-6 mb-4">
                    <div class="card shadow-lg border-0" style="background-color: #e3f2fd;">
                        <div class="card-body d-flex align-items-center">
                            <div class="me-3 icon-container">
                                <i class="fas fa-book fa-2x text-primary"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Total Courses</h5>
                                <p class="card-text fs-4">{{ $totalCourses }}</p>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between border-top-0">
                            <a class="btn btn-sm btn-primary" href="{{ route('courses.index') }}">View</a>
                            <a class="btn btn-sm btn-primary" href="{{ route('courses.create') }}">Create</a>
                        </div>
                    </div>
                </div>

                <!-- Total Users Section -->
                <div class="col-md-6 col-xl-6 mb-4">
                    <div class="card shadow-lg border-0" style="background-color: #e3f2fd;">
                        <div class="card-body d-flex align-items-center">
                            <div class="me-3 icon-container">
                                <i class="fas fa-users fa-2x text-primary"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Total Users</h5>
                                <p class="card-text fs-4">{{ $totalUsers }}</p>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between border-top-0">
                            <a class="btn btn-sm btn-primary" href="{{ route('users.index') }}">View</a>
                            <a class="btn btn-sm btn-primary" href="{{ route('users.create') }}">Create</a>
                        </div>
                    </div>
                </div>

                <!-- Total Blogs Section -->
                <div class="col-md-6 col-xl-6 mb-4">
                    <div class="card shadow-lg border-0" style="background-color: #e3f2fd;">
                        <div class="card-body d-flex align-items-center">
                            <div class="me-3 icon-container">
                                <i class="fas fa-blog fa-2x text-primary"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Total Blogs</h5>
                                <p class="card-text fs-4">{{ $totalBlogs }}</p>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between border-top-0">
                            <a class="btn btn-sm btn-primary" href="{{ route('blogs.index') }}">View</a>
                            <a class="btn btn-sm btn-primary" href="{{ route('blogs.create') }}">Create</a>
                        </div>
                    </div>
                </div>

                <!-- Total Categories Section -->
                <div class="col-md-6 col-xl-6 mb-4">
                    <div class="card shadow-lg border-0" style="background-color: #e3f2fd;">
                        <div class="card-body d-flex align-items-center">
                            <div class="me-3 icon-container">
                                <i class="fas fa-tags fa-2x text-primary"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Total Categories</h5>
                                <p class="card-text fs-4">{{ $totalCategories }}</p>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between border-top-0">
                            <a class="btn btn-sm btn-primary" href="{{ route('categories.index') }}">View</a>
                            <a class="btn btn-sm btn-primary" href="{{ route('categories.create') }}">Create</a>
                        </div>
                    </div>
                </div>

                <!-- Enrollment Section -->
                <div class="col-md-6 col-xl-6 mb-4">
                    <div class="card shadow-lg border-0" style="background-color: #e3f2fd;">
                        <div class="card-body d-flex align-items-center">
                            <div class="me-3 icon-container">
                                <i class="fas fa-calendar-check fa-2x text-primary"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Total Enrollments</h5>
                                <p class="card-text fs-4">{{ $totalEnrollments }}</p>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between border-top-0">
                            <a href="{{ route('enrollments.index') }}" class="btn btn-sm btn-primary">View</a>
                            <a href="{{ route('enrollments.create') }}" class="btn btn-sm btn-primary">Create</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            // User Growth Chart
            var ctxUserGrowth = document.getElementById('userGrowthChart')?.getContext('2d');
            if (ctxUserGrowth) {
                new Chart(ctxUserGrowth, {
                    type: 'line',
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                        datasets: [{
                            label: 'User Growth',
                            data: [10, 20, 15, 30, 25, 35, 40],
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            fill: true
                        }]
                    },
                    options: {
                        scales: {
                            x: {
                                beginAtZero: true
                            },
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }

            // Enroll Growth Chart
            var ctxEnrollGrowth = document.getElementById('enrollGrowthChart')?.getContext('2d');
            if (ctxEnrollGrowth) {
                new Chart(ctxEnrollGrowth, {
                    type: 'bar',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                        datasets: [{
                            label: 'Enrollments',
                            data: [50, 60, 70, 80, 90, 100, 110],
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            x: {
                                beginAtZero: true
                            },
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        });
    </script> -->
</x-admin-layout>
