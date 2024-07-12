<x-header/>
<div class="container mt-3">
    <h1>{{ $blog->title }}</h1>
    <p>By {{ $blog->author }} on {{ $blog->created_at->format('M d, Y') }}</p>
    <div>
        {!! $blog->content !!}
    </div>
    <a href="{{ route('posts') }}" class="btn btn-secondary mt-3">Back to Blog List</a>
</div>
<x-footer/>