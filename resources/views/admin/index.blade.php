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
                    <div class="card shadow-lg border-0 bg-gradient">
                        <div class="card-body d-flex align-items-center">
                            <div class="me-3 icon-container">
                                <i class="fas fa-book fa-2x text-primary"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Total Courses</h5>
                                <p class="card-text fs-4">{{ $totalCourses }}</p>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-gradient border-top-0">
                            <a class="btn btn-sm btn-primary" href="{{ route('courses.index') }}">View</a>
                            <a class="btn btn-sm btn-primary" href="{{ route('courses.create') }}">Create</a>
                        </div>
                    </div>
                </div>

                <!-- Total Users Section -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card shadow-lg border-0 bg-gradient">
                        <div class="card-body d-flex align-items-center">
                            <div class="me-3 icon-container">
                                <i class="fas fa-users fa-2x text-primary"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Total Users</h5>
                                <p class="card-text fs-4">{{ $totalUsers }}</p>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-gradient border-top-0">
                            <a class="btn btn-sm btn-primary" href="{{ route('users.index') }}">View</a>
                        </div>
                    </div>
                </div>

                <!-- Total Blogs Section -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card shadow-lg border-0 bg-gradient">
                        <div class="card-body d-flex align-items-center">
                            <div class="me-3 icon-container">
                                <i class="fas fa-blog fa-2x text-primary"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Total Blogs</h5>
                                <p class="card-text fs-4">{{ $totalBlogs }}</p>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-gradient border-top-0">
                            <a class="btn btn-sm btn-primary" href="{{ route('blogs.index') }}">View</a>
                            <a class="btn btn-sm btn-primary" href="{{ route('blogs.create') }}">Create</a>
                        </div>
                    </div>
                </div>

                <!-- Total Categories Section -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card shadow-lg border-0 bg-gradient">
                        <div class="card-body d-flex align-items-center">
                            <div class="me-3 icon-container">
                                <i class="fas fa-tags fa-2x text-primary"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Total Categories</h5>
                                <p class="card-text fs-4">{{ $totalCategories }}</p>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-gradient border-top-0">
                            <a class="btn btn-sm btn-primary" href="{{ route('categories.index') }}">View</a>
                            <a class="btn btn-sm btn-primary" href="{{ route('categories.create') }}">Create</a>
                        </div>
                    </div>
                </div>

                <!-- User Growth Chart -->
                {{-- <div class="col-xl-6 col-md-12 mb-4">
                    <div class="card shadow-lg border-0 bg-gradient">
                        <div class="card-header bg-primary text-white">
                            User Growth
                        </div>
                        <div class="card-body">
                            <canvas id="userGrowthChart"></canvas>
                        </div>
                    </div>
                </div> --}}

                <!-- Enroll Growth Chart -->
                {{-- <div class="col-xl-6 col-md-12 mb-4">
                    <div class="card shadow-lg border-0 bg-gradient">
                        <div class="card-header bg-primary text-white">
                            Enroll Growth
                        </div>
                        <div class="card-body">
                            <canvas id="enrollGrowthChart"></canvas>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </main>
    <style>
        .card {
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            width: 100%; /* Ensure the card takes full width of its container */
        }

        .card.bg-gradient {
            background: linear-gradient(135deg, rgba(210, 216, 241, 0.9), rgba(255, 255, 255, 0.8));
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .btn-primary {
            padding: 0.25rem 1rem;
            font-size: 0.85rem;
            white-space: nowrap;
            border-radius: 12px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            color: #fff;
        }

        .icon-container {
            background: rgba(173, 216, 230, 0.5);
            border-radius: 50%;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-body .fa-2x {
            font-size: 2.5rem;
        }

        .card-footer {
            border-top: none;
        }

        .row.g-4 {
            gap: 2rem;
        }

        .card-header {
            font-weight: bold;
            text-transform: uppercase;
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
