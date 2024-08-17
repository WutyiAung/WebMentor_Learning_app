<!-- resources/views/dashboard.blade.php -->
<x-admin-layout>
    <main>
        <div class="container-fluid px-4">
            <ol class="breadcrumb my-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>

            <!-- Dashboard Cards -->
            <div class="row g-4" style="margin-left:5rem">
                <!-- Total Courses Section -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card shadow-sm border-light bg-lightblue">
                        <div class="card-body d-flex align-items-center">
                            <div class="me-3 icon-container">
                                <i class="fas fa-book fa-2x text-primary"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Total Courses</h5>
                                <p class="card-text fs-4">{{ $totalCourses }}</p>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border-top border-dark">
                            <a class="btn btn-sm btn-lightblue" href="{{ route('courses.index') }}">View Courses</a>
                            <a class="btn btn-sm btn-lightblue" href="{{ route('courses.create') }}">Create Course</a>
                        </div>
                    </div>
                </div>

                <!-- Total Users Section -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card shadow-sm border-light bg-lightblue">
                        <div class="card-body d-flex align-items-center">
                            <div class="me-3 icon-container">
                                <i class="fas fa-users fa-2x text-info"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Total Users</h5>
                                <p class="card-text fs-4">{{ $totalUsers }}</p>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border-top border-dark">
                            <a class="btn btn-sm btn-lightblue" href="{{ route('users.index') }}">View Users</a>
                        </div>
                    </div>
                </div>

                <!-- Total Blogs Section -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card shadow-sm border-light bg-lightblue">
                        <div class="card-body d-flex align-items-center">
                            <div class="me-3 icon-container">
                                <i class="fas fa-blog fa-2x text-success"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Total Blogs</h5>
                                <p class="card-text fs-4">{{ $totalBlogs }}</p>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border-top border-dark">
                            <a class="btn btn-sm btn-lightblue" href="{{ route('blogs.index') }}">View Blogs</a>
                            <a class="btn btn-sm btn-lightblue" href="{{ route('blogs.create') }}">Create Blog</a>
                        </div>
                    </div>
                </div>

                <!-- Total Categories Section -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card shadow-sm border-light bg-lightblue">
                        <div class="card-body d-flex align-items-center">
                            <div class="me-3 icon-container">
                                <i class="fas fa-tags fa-2x text-warning"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Total Categories</h5>
                                <p class="card-text fs-4">{{ $totalCategories }}</p>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border-top border-dark">
                            <a class="btn btn-sm btn-lightblue" href="{{ route('categories.index') }}">View Categories</a>
                            <a class="btn btn-sm btn-lightblue" href="{{ route('categories.create') }}">Create Category</a>
                        </div>
                    </div>
                </div>

                <!-- User Growth Chart -->
                <div class="col-xl-6 col-md-12 mb-4">
                    <div class="card shadow-sm border-light bg-lightblue">
                        <div class="card-header">
                            User Growth
                        </div>
                        <div class="card-body">
                            <canvas id="userGrowthChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Enroll Growth Chart -->
                <div class="col-xl-6 col-md-12 mb-4">
                    <div class="card shadow-sm border-light bg-lightblue">
                        <div class="card-header">
                            Enroll Growth
                        </div>
                        <div class="card-body">
                            <canvas id="enrollGrowthChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <style>
        .btn-lightblue {
            background-color: rgb(210, 216, 241);
            color: #000; /* Set text color to black for better contrast */
        }

        .card {
            border-radius: 10px; /* Rounded corners for the card */
            overflow: hidden; /* Ensure child elements don't overflow */
            margin-left: 1.5rem; /* Add margin to the left of all cards */
        }

        .card.bg-lightblue {
            background-color: rgb(210, 216, 241); /* Light blue background color for cards */
        }

        .icon-container {
            background: rgba(173, 216, 230, 0.5); /* Light blue fade color */
            border-radius: 50%; /* Circular background for icons */
            padding: 15px; /* Add space around the icon */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-body .fa-2x {
            font-size: 2rem; /* Adjust icon size */
        }

        .card-footer {
            border-top: 1px solid #ddd;
        }

        /* Add gap between cards */
        .row.g-4 {
            gap: 1.5rem; /* Adjust gap size as needed */
        }

        /* Chart container styling */
        .card-header {
            font-weight: bold;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // User Growth Chart
            var ctxUserGrowth = document.getElementById('userGrowthChart').getContext('2d');
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

            // Enroll Growth Chart
            var ctxEnrollGrowth = document.getElementById('enrollGrowthChart').getContext('2d');
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
        });
    </script>
</x-admin-layout>
