<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="google-translate-customization" content="9f841e7780177523-3214ceb76f765f38-gc38c6fe6f9d06436-c">
    </meta>
    <title>WebMentor : Online Courses</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/icon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/css/style.css" rel="stylesheet">
   
</head>

<body>

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <p class="m-0 fw-bold" style="font-size: 25px;"><img src="img/icon.png" alt="" height="50px">
                WebMentor
            </p>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <!-- index.blade.php -->
                <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>

                <!-- about.blade.php -->
                <a href="{{ route('about') }}" class="nav-item nav-link">About</a>

                <a href="{{ route('posts') }}" class="nav-item nav-link">Posts</a>

                <!-- paths.blade.php -->
                <a href="{{ route('paths') }}" class="nav-item nav-link">Paths</a>

                <!-- courses.blade.php -->
                <a href="{{ route('public.courses') }}" class="nav-item nav-link">Courses</a>



                <!-- contact.blade.php -->
                <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>

                <!-- login.blade.php -->
                <div> 
                    <a href="{{ route('login') }}" class="nav-item nav-link "><i class="fa fa-user"></i></a>
                </div>

                <div>
                    <a href="" id="darkModeToggle" class="nav-item nav-link "> <i class="fas fa-moon"></i> </a>
                </div>
            
                
            </div>
        </div>
    </nav>
    <!-- Navbar End -->