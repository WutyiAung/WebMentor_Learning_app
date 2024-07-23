<!-- resources/views/categories/edit.blade.php -->
<x-admin-layout>
    <main>
        <div class="container">
            <div class="card mt-4">
                <div class="card-header">
                    <h5>Edit Category</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="form-label text-primary fw-bold">Name</label>
                            <input type="text" class="form-control text-dark fw-bold @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $category->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="slug" class="form-label text-primary fw-bold">Slug</label>
                            <input type="text" class="form-control text-dark fw-bold @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $category->slug) }}" required>
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="description" class="form-label text-primary fw-bold">Description</label>
                            <textarea class="form-control text-dark fw-bold @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $category->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="image" class="form-label text-primary fw-bold">Category Image</label>
                            <input type="file" class="form-control text-dark fw-bold @error('image') is-invalid @enderror" id="image" name="image">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if($category->image)
                                <div class="mt-3">
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="img-thumbnail" width="150">
                                </div>
                            @endif
                        </div>
                        <div class="mb-4">
                            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-admin-layout>
