<!-- resources/views/emails/course_created.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>New Course Created</title>
</head>
<body>
    <h1>New Course: {{ $title }}</h1>
    <p>{{ $description }}</p>
    <a href="{{ $url }}">Check out the course here</a>
    <p>{{ $content }}</p>
</body>
</html>
