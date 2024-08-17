<x-admin-layout>
    <main>
        <!-- Include session messages -->
        <div class="mt-3 mx-3">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        <div class="container-fluid px-2">
            <div class="card mb-4 mt-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fas fa-table me-1"></i>
                        Courses List
                    </div>
                    <a href="{{ route('courses.create') }}" class="btn btn-success btn-sm">Create Course</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatablesSimple" class="table table-striped table-bordered">
                            <thead class="thead-dark">
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
                                        <td style="word-wrap: break-word; max-width: 150px;">{{ $course->title }}</td>
                                        <td style="word-wrap: break-word; max-width: 250px;">{{ $course->description }}</td>
                                        <td style="word-wrap: break-word; max-width: 150px;">{{ $course->category->name }}</td>
                                        <td style="word-wrap: break-word; max-width: 150px;"><a href="{{ $course->url }}" target="_blank">{{ $course->url }}</a></td>
                                        <td style="word-wrap: break-word; max-width: 150px;">{{ $course->source }}</td>
                                        <td>
                                            <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info btn-sm my-2">View</a>
                                            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary btn-sm my-2">Edit</a>
                                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this course?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination Links -->
                    <div class="d-flex justify-content-center">
                        {{ $courses->links() }}
                    </div>
                </div>
            </div> 
        </div>
    </main>
</x-admin-layout>
