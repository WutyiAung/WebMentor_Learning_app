<!-- resources/views/blogs/create.blade.php -->
<x-admin-layout>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Add Blog</h1>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-plus me-1"></i>
                    Add Blog
                </div>
                <div class="container card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="author" class="form-label">Author</label>
                                <input type="text" class="form-control" id="author" name="author">
                            </div>
                            {{-- <div class="mb-3">
                                <label for="blog_category_id" class="form-label">Category</label>
                                <select class="form-control" id="blog_category_id" name="blog_category_id">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Add Blog</button>
                            </div>
                        </form>
                    </div>
                </div> 
            </div>
        </div>
    </main>
</x-admin-layout>
