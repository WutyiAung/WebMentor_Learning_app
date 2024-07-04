<x-admin-layout>
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <i class="fas fa-edit me-1"></i>
                    Edit Course
                </div>
                <div class="card-body">
                    <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="title" class="form-label text-primary fw-bold">Title</label>
                                <input type="text" class="form-control text-primary fw-bold @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $course->title) }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="category" class="form-label text-primary fw-bold">Category</label>
                                <select class="form-control text-primary fw-bold @error('category_id') is-invalid @enderror" id="category" name="category_id" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $course->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label text-primary fw-bold">Description</label>
                            <textarea class="form-control text-primary fw-bold @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description', $course->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="url" class="form-label text-primary fw-bold">YouTube URL</label>
                                <input type="url" class="form-control text-primary fw-bold @error('url') is-invalid @enderror" id="youtube_url" name="url" value="{{ old('url', $course->url) }}" required>
                                @error('url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="youtube_playlist_id" class="form-label text-primary fw-bold">YouTube Playlist ID</label>
                                <input type="text" class="form-control text-primary fw-bold @error('youtube_playlist_id') is-invalid @enderror" id="youtube_playlist_id" name="youtube_playlist_id" value="{{ old('youtube_playlist_id', $course->youtube_playlist_id) }}">
                                @error('youtube_playlist_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="source" class="form-label text-primary fw-bold">Source</label>
                                <input type="text" class="form-control text-primary fw-bold @error('source') is-invalid @enderror" id="source" name="source" value="{{ old('source', $course->source) }}" required>
                                @error('source')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="image" class="form-label text-primary fw-bold">Image</label>
                                <input type="file" class="form-control text-primary fw-bold @error('image') is-invalid @enderror" id="image" name="image">
                                @if($course->image)
                                    <small>Current Image: {{ $course->image }}</small>
                                @endif
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="level" class="form-label text-primary fw-bold">Level</label>
                                <input type="text" class="form-control text-primary fw-bold @error('level') is-invalid @enderror" id="level" name="level" value="{{ old('level', $course->level) }}">
                                @error('level')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="language" class="form-label text-primary fw-bold">Language</label>
                                <input type="text" class="form-control text-primary fw-bold @error('language') is-invalid @enderror" id="language" name="language" value="{{ old('language', $course->language) }}">
                                @error('language')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-admin-layout>
