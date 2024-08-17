<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'WebMentor') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom CSS -->
    <style>
        body {
            background-image: url('/img/login_bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            color: white;
            margin: 0; /* Remove default margin */
            display: flex;
            align-items: center;
            justify-content: flex-start; /* Align content to the left */
            min-height: 100vh; /* Full viewport height */
            padding: 0 2rem; /* Add padding to the left side */
        }
        .slot-container {
            background: transparent;
            display: flex;
            justify-content: flex-start; /* Align form to the left */
            width: 100%;
        }
        .slot-container .content-box {
            background: rgba(0, 0, 0, 0.3); /* Grey with 30% transparency */
            padding: 20px;
            border-radius: 10px;
            max-width: 400px; /* Increased width */
            width: 100%; /* Ensure it uses the max-width fully */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); /* Add shadow */
            margin: auto;

        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="slot-container">
        <div class="content-box shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
