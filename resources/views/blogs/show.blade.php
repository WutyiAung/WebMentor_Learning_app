<!-- resources/views/blogs/show.blade.php -->
<x-admin-layout>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Blog Details</h1>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-eye me-1"></i>
                    Blog Details
                </div>
                <div class="container card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label"><strong>Title:</strong></label>
                            <p>{{ $blog->title }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><strong>Content:</strong></label>
                            <p>{{ $blog->content }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><strong>Author:</strong></label>
                            <p>{{ $blog->author ?? 'No author specified' }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><strong>Category:</strong></label>
                            <p>{{ $blog->category ? $blog->category->name : 'Uncategorized' }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><strong>Image:</strong></label>
                            @if ($blog->image)
                                <img src="{{ Storage::url($blog->image) }}" alt="Blog Image" width="300">
                            @else
                                <p>No image uploaded</p>
                            @endif
                        </div>
                        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-admin-layout>
