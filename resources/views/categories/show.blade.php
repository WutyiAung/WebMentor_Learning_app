<x-admin-layout>
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-center mt-2">
                <div class="card mb-4" style="max-width: 800px; width: 100%;">
                    <div class="card-header">
                        <i class="fas fa-eye me-1"></i>
                        Category Details
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label"><strong>ID:</strong></label>
                            <p>{{ $category->id }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><strong>Name:</strong></label>
                            <p>{{ $category->name }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><strong>Slug:</strong></label>
                            <p>{{ $category->slug }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><strong>Description:</strong></label>
                            <p>{{ $category->description }}</p>
                        </div>
                        @if($category->image)
                            <div class="mb-3">
                                <label class="form-label"><strong>Image:</strong></label>
                                <div>
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="img-thumbnail" width="150">
                                </div>
                            </div>
                        @endif
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-admin-layout>
