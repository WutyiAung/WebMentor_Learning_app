<x-admin-layout>
    <main>
        <div class="container-fluid px-4">

            <h1 class="mt-4">Edit Blog Category</h1>
           
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-edit me-1"></i>
                    Edit Blog Category
                </div>
                <div class="container card">
                    <div class="card-body">
                        <form action="{{ route('blog_categories.update', $blogCategory->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $blogCategory->name }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Category</button>
                        </form>
                    </div>
                </div> 
            </div>

        </div>
    </main>
</x-admin-layout>
