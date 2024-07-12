<!-- resources/views/blogs/index.blade.php -->
<x-admin-layout>
    <main>
        <div class="container-fluid px-4">
            <div class="mt-3">
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
            <h1 class="mt-4">Blogs</h1>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fas fa-table me-1"></i>
                        Blogs List
                    </div>
                    <a href="{{ route('blogs.create') }}" class="btn btn-sm btn-primary">Add Blog</a>
                </div>
                <div class="container card">
                    <div class="card-body">
                        <table id="datatablesSimple" class="table table-striped table-bordered">
                            <thead class="thead-dark">
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
                                            <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirmDelete()">Delete</button>
                                            </form>
                                            <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-sm btn-info">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $blogs->links() }}
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </main>

    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this blog?');
        }
    </script>
</x-admin-layout>
