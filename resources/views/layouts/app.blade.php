<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="/css/styles.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <link rel="stylesheet" href="/css/dashboard.css">
        <link href="/css/style.css" rel="stylesheet">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 ">
            <nav class="navbar navbar-expand-lg navbar-light shadow sticky-top p-0" style="background: #0f319a">
                <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
                    <img src="/img/icon.png" alt="WebMentor Logo"  width="65px" height="65px" class="me-2">
                    <p class="m-0 fw-bold" style="font-size: 26px; color:white">
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

            <!-- Page Heading -->
            {{-- @isset($header)
                <header class="bg-white  shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset --}}

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script src="/js/dashboard.js"></script>
   <x-footer/>
