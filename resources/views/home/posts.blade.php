<x-header/>
<div class="container mt-5">
    <div class="text-center mb-5">
        <h1>WebMentor’s Blogs & Tricks</h1>
        <p>Spend 5 minutes every day and improve your skills by reading our posts.</p>
    </div>
    <form action="{{ route('posts') }}" method="GET" class="mb-5 d-flex justify-content-center">
        <div class="input-group"  style="margin-left:10rem; width:50%" >
            <input type="text" name="search" class="search" placeholder="Search blogs..." value="{{ request()->query('search') }}" style="width: 60%; border-color:#0d6efd">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
    <div class="row">
        @foreach ($blogs as $blog)
        <div class="col-md-4 mb-4">
            <a href="{{ route('public.blogs.show', $blog->id) }}" class="card-link" style="text-decoration: none;">
                <div class="card">
                    <div style="height: 200px; overflow: hidden;">
                        <img src="{{ $blog->image ? asset('storage/' . $blog->image) : 'path/to/default/image.jpg' }}" class="card-img-top img-fluid" alt="{{ $blog->title }}" style="object-fit: cover; height: 100%;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $blog->title }}</h5>
                        <p class="card-text">{{ Str::limit($blog->content, 100) }}</p>
                        <p class="mb-2"><strong>Author:</strong> {{ $blog->author }}</p>
                    </div>
                </div>
            </a>
        </div>
        
        
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $blogs->links() }}
    </div>
</div>
<x-footer/>
