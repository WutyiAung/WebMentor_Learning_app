<!-- resources/views/blogs/edit.blade.php -->
<x-admin-layout>
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-edit me-1"></i>
                    Edit Blog
                </div>
                <div class="container card">
                    <div class="card-body">
                        <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $blog->title) }}" required>
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content', $blog->content) }}</textarea>
                                @error('content')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="author" class="form-label">Author</label>
                                <input type="text" class="form-control" id="author" name="author" value="{{ old('author', $blog->author) }}">
                                @error('author')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- <div class="mb-3">
                                <label for="blog_category_id" class="form-label">Category</label>
                                <select class="form-control" id="blog_category_id" name="blog_category_id">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $blog->blog_category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('blog_category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div> --}}
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                @if ($blog->image)
                                    <img src="{{ Storage::url($blog->image) }}" alt="Blog Image" width="100" class="mt-2">
                                @endif
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update Blog</button>
                            <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-admin-layout>
