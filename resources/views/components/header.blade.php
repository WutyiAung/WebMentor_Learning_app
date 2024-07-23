<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-translate-customization" content="9f841e7780177523-3214ceb76f765f38-gc38c6fe6f9d06436-c">
    <title>WebMentor : Online Courses</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/icon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Template Stylesheet -->
    <link href="/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-light shadow sticky-top p-0" style="background: #0e5ed5">
    <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <p class="m-0 fw-bold" style="font-size: 25px; color:white">
            <img src="/img/icon.png" alt="WebMentor Logo" height="50px">
            WebMentor
        </p>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <!-- index.blade.php -->
            <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>

            <!-- about.blade.php -->
            <a href="{{ route('about') }}" class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>

            <a href="{{ route('posts') }}" class="nav-item nav-link {{ request()->routeIs('posts') ? 'active' : '' }}">Posts</a>

            <!-- paths.blade.php -->
            <a href="{{ route('paths') }}" class="nav-item nav-link {{ request()->routeIs('paths') ? 'active' : '' }}">Paths</a>

            <!-- courses.blade.php -->
            <a href="{{ route('public.courses') }}" class="nav-item nav-link {{ request()->routeIs('public.courses') ? 'active' : '' }}">Courses</a>

            <!-- contact.blade.php -->
            <a href="{{ route('contact') }}" class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>

            <!-- User Authentication Links -->
            <div class="d-flex align-items-center">
                @auth
                    <!-- Profile Image and Dropdown as Link -->
                    <div class="dropdown">
                        <!-- Profile Image Link -->
                        <a href="#" class="btn btn-link p-0 dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <!-- Rounded profile image from the image column -->
                            @if (Auth::user()->image)
                                <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="Profile Image" class="profile-image">
                            @else
                                 <img src="/storage/profile_images/default.png" alt="Profile Image" class="profile-image">
                            @endif
                         
                        </a>
            
                        <!-- Dropdown menu -->
                        <ul style="  right: auto; left: -80px" class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown" style="margin-right: 30px">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    <i class="fa fa-user me-2"></i> Profile
                                </a>
                            </li>
                            <li>
                                @if(auth()->user()->is_admin)
                                    <a class="dropdown-item" href="{{ route('dashboard') }}">
                                        <i class="fa fa-tachometer-alt me-2"></i> Dashboard
                                    </a>
                                @else
                                    <a class="dropdown-item" href="{{ route('student.dashboard') }}">
                                        <i class="fa fa-tachometer-alt me-2"></i> Dashboard
                                    </a>
                                @endif
                            </li>
                            <li>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}" 
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out-alt me-2"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Logout Form -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="nav-item nav-link"><i class="fa fa-user"></i> Login</a>
                    <a href="{{ route('register') }}" class="nav-item nav-link"><i class="fa fa-user-plus"></i> Register</a>
                @endauth
            </div>
        </div>
    </div>
</nav>


    <!-- Navbar End -->
</body>
</html>
