<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        /* Custom CSS for sidebar text color */
        .sb-sidenav .nav-link, .sb-sidenav .sb-sidenav-menu-heading {
            color: white !important;
        }

        .sb-sidenav .nav-link:hover {
            color: #333 !important; /* Darker color on hover */
        }

        .sb-sidenav .nav-link.collapsed .sb-sidenav-collapse-arrow {
            color: black !important;
        }

        .sb-sidenav .nav-link.collapsed:hover .sb-sidenav-collapse-arrow {
            color: #333 !important; /* Darker color on hover */
        }

        .sb-sidenav-footer {
            color: black !important;
        }

        /* Custom CSS for profile image */
        .profile-img {
            width: 50px; /* Increased width */
            height: 50px; /* Increased height */
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid white; /* Added border */
        }

        /* Custom background colors */
        .sb-topnav {
            background: #0f319a;/* Light SkyBlue */
        }

        .sb-sidenav {
            background: #0f319a; /* Light SkyBlue */
        }

        .card {
            background: #f8f9fa; /* Light background for cards */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Added shadow to cards */
        }

        /* Button styles */
        .btn-primary {
            background-color: #007bff; /* Update button background color */
            border-color: #007bff; /* Border color for buttons */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover */
            border-color: #0056b3; /* Darker blue border on hover */
        }

        /* Create User button */
        .btn-create-user {
            background-color: #28a745; /* Green background */
            border-color: #28a745; /* Green border */
        }

        .btn-create-user:hover {
            background-color: #218838; /* Darker green on hover */
            border-color: #1e7e34; /* Darker green border on hover */
        }

        /* Custom styles for dashboard content */
        .additional-content {
            margin-bottom: 1rem;
        }

        .icon-container {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
    </style>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{ route('home') }}" style="color:white; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">WebMentor . Admin</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars" style="color:black"></i></button>

        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" method="GET" action="{{ route('search') }}">
            <div class="input-group">
                <input class="form-control" type="text" name="query" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" value="{{ request()->input('query') }}" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="submit" style="background: #3153d0;"><i class="fas fa-search"></i></button>
            </div>
        </form>
        
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @if (Auth::user()->image)
                        <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="Profile Image" class="profile-img">
                    @else
                        <img src="/storage/profile_images/default.png" alt="Profile Image" class="profile-img">
                    @endif
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item"  href="{{ route('profile.edit')}}">Profile</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Interface</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Courses
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('categories.index') }}">Manage Categories</a>
                            <a class="nav-link" href="{{ route('courses.index') }}">Manage Courses</a>
                        </nav>
                    </div>

                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Blogs
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link" href="{{ route('blogs.index') }}">Manage Blogs</a>
                        </nav>
                    </div>

                    <!-- Users Section -->
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUsers" aria-expanded="false" aria-controls="collapseUsers">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Users
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseUsers" aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('users.index') }}">Manage Users</a>
                            <a class="nav-link" href="{{ route('users.create') }}">
                                <button class="btn btn-create-user">Create User</button>
                            </a>
                        </nav>
                    </div>

                    <!-- Enrollments Section -->
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseEnrollments" aria-expanded="false" aria-controls="collapseEnrollments">
                        <div class="sb-nav-link-icon"><i class="fas fa-calendar-check"></i></div>
                        Enrollments
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseEnrollments" aria-labelledby="headingFour" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('enrollments.index') }}">Manage Enrollments</a>
                            <a class="nav-link" href="{{ route('enrollments.create') }}">Create Enrollment</a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small" style="color:white">Logged in as:</div>
                @auth
                    <div style="color:white">
                        {{ Auth::user()->name }}
                    </div>
                @endauth
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        {{ $slot }}
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; WebMentor 2024</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"></script>
    <script src="/js/scripts.js"></script>
</body>
</html>
