<x-admin-layout>
<div class="container mx-5 mt-5 col-md-10">
        <h1>Enrollment Details</h1>

        <div class="card">
            <div class="card-header">
                Enrollment #{{ $enrollment->id }}
            </div>
            <div class="card-body">
                <h5 class="card-title">User: {{ $enrollment->user->name }}</h5>
                <p class="card-text">User ID: {{ $enrollment->user_id }}</p>
                <h5 class="card-title">Course: {{ $enrollment->course->title }}</h5>
                <p class="card-text">Course ID: {{ $enrollment->course_id }}</p>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('enrollments.index') }}" class="btn btn-primary">Back to List</a>
                <a href="{{ route('enrollments.edit', $enrollment->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
</x-admin-layout>