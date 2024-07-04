<x-admin-layout>
    <main>
        <div class="container-fluid px-4">

            <h1 class="mt-4">Blog Categories</h1>
           
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Blog Categories List
                </div>
                <div class="container card">
                    <div class="card-body">
                        <a href="{{ route('blog_categories.create') }}" class="btn btn-primary mb-3">Add Category</a>
                        <table id="datatablesSimple" class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <a href="{{ route('blog_categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('blog_categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                         <!-- Pagination Links -->
                         <div class="d-flex justify-content-center">
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div> 
            </div>

        </div>
    </main>
</x-admin-layout>
