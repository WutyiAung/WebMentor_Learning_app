<x-header/>
<div class="container mt-5">
    <div class="text-center mb-5">
        <h1>WebMentor’s Blogs & Tricks</h1>
        <p>Spend 5 minutes every day and improve your skills by reading our posts.</p>
    </div>
    <form action="{{ route('posts') }}" method="GET" class="mb-5">
        <div class="input-group ">
            <input type="text" name="search" class="form-control" placeholder="Search blogs..." value="{{ request()->query('search') }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
    <div class="row">
        @foreach ($blogs as $blog)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ $blog->image ? asset('storage/' . $blog->image) : 'path/to/default/image.jpg' }}" class="card-img-top" alt="{{ $blog->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $blog->title }}</h5>
                    <p class="card-text">{{ Str::limit($blog->content, 100) }}</p>
                    <p class="mb-2"><strong>Author:</strong> {{ $blog->author }}</p> <!-- Added author here -->
                    <a href="{{ route('public.blogs.show', $blog->id) }}" class="btn btn-primary">Read more</a>
                </div>
            </div>
        </div>
         @endforeach
    
    </div>
    <div class="d-flex justify-content-center">
        {{ $blogs->links() }}
    </div>
</div>
<x-footer/>
