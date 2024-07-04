<!-- resources/views/search_results.blade.php -->
<x-admin-layout>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Search Results</h1>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fas fa-search me-1"></i>
                        Search Results
                    </div>
                </div>
                <div class="card-body">
                    @if($query)
                        <h2>Blogs</h2>
                        @if($blogs->isNotEmpty())
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Author</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogs as $blog)
                                        <tr>
                                            <td>{{ $blog->title }}</td>
                                            <td>{{ $blog->category ? $blog->category->name : 'Uncategorized' }}</td>
                                            <td>{{ $blog->author }}</td>
                                            <td>
                                                <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-sm btn-info">View</a>
                                                <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this blog?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $blogs->appends(['query' => $query, 'courses_page' => $courses->currentPage()])->links() }}
                            </div>
                        @else
                            <div class="alert alert-info" role="alert">
                                No blogs found matching your search query.
                            </div>
                        @endif

                        <h2>Courses</h2>
                        @if($courses->isNotEmpty())
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Category</th>
                                        <th>URL</th>
                                        <th>Source</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $course)
                                        <tr>
                                            <td>{{ $course->title }}</td>
                                            <td>{{ $course->description }}</td>
                                            <td>{{ $course->category ? $course->category->name : 'Uncategorized' }}</td>
                                            <td><a href="{{ $course->url }}" target="_blank">{{ $course->url }}</a></td>
                                            <td>{{ $course->source }}</td>
                                            <td>
                                                <a href="{{ route('courses.show', $course->id) }}" class="btn btn-sm btn-info">View</a>
                                                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this course?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $courses->appends(['query' => $query, 'blogs_page' => $blogs->currentPage()])->links() }}
                            </div>
                        @else
                            <div class="alert alert-info" role="alert">
                                No courses found matching your search query.
                            </div>
                        @endif
                    @else
                        <div class="alert alert-info" role="alert">
                            Please enter a search query to see results.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
</x-admin-layout>
