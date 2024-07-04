<x-admin-layout>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Course Details</h1>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-eye me-1"></i>
                    Course Details
                </div>
                <div class="container card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label"><strong>Title:</strong></label>
                            <p>{{ $course->title }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><strong>Description:</strong></label>
                            <p>{{ $course->description }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><strong>Category:</strong></label>
                            <p>{{ $course->category ? $course->category->name : 'No category assigned' }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><strong>URL:</strong></label>
                            <p><a href="{{ $course->url }}" target="_blank">{{ $course->url }}</a></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><strong>Source:</strong></label>
                            <p>{{ $course->source }}</p>
                        </div>
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-admin-layout>
