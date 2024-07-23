<x-header/>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Blog Section -->
            <div class="card mb-4 blog-card">
                <div id="blogCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('storage/images/default.jpg') }}" class="d-block w-100" alt="{{ $blog->title }}" style="object-fit: cover; height: 300px;">
                        </div>
                        <!-- Add more carousel-item divs here if there are multiple images -->
                    </div>
                </div>
                <div class="card-body">
                    <h1 class="card-title">{{ $blog->title }}</h1>
                    <p class="text-muted">By {{ $blog->author }} on {{ $blog->created_at->format('M d, Y') }} | Estimated Read Time: 3 mins</p>
                    <p class="card-text description">{{ $blog->description }}</p>
                    <hr>
                    <div style="line-height: 2.5rem;">
                        {!! $blog->content !!}
                    </div>
                    <div class="mt-4">
                        <a href="#" class="btn btn-link"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="btn btn-link"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="btn btn-link"><i class="bi bi-linkedin"></i></a>
                    </div>
                    <a href="{{ route('posts') }}" class="btn btn-secondary mt-3">Back to Blog List</a>
                </div>
            </div>

            <!-- Comments Section -->
            <div class="card mt-4 comment-card">
                <div class="card-body comment-card-body" style="width:80%">
                    <h5 class="card-title">Comments</h5>
            
                    <!-- Display Success Message -->
                    @if(session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('comments.store', $blog->id) }}">
                        @csrf
                        <div class="d-flex align-items-start mb-3">
                            @auth
                                <img src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('storage/profile_images/default.png') }}" class="rounded-circle me-2" alt="User Profile Picture" style="width: 50px; height: 50px; object-fit: cover;">
                            @endauth
                            <div class="flex-grow-1">
                                <textarea class="form-control comment-input" id="comment" name="comment" rows="5" placeholder="Leave a comment..." required style="border: 1px solid rgba(15, 15, 15, 0.274)"></textarea>
                                <button type="submit" class="btn btn-primary mt-2">Comment</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <!-- List of Comments -->
                    @foreach($blog->comments as $comment)
                        <div class="comment mb-3" data-comment-id="{{ $comment->id }}">
                            <div class="d-flex align-items-start">
                                <img src="{{ $comment->user->image ? asset('storage/' . $comment->user->image) : asset('storage/profile_images/default.png') }}" class="rounded-circle me-2" alt="User Profile Picture" style="width: 50px; height: 50px; object-fit: cover;">
                                <div>
                                    <p><strong>{{ $comment->user->name }}</strong> on {{ $comment->created_at->format('M d, Y') }}</p>
                                    <p class="comment-text">{{ $comment->comment }}</p>
            
                                    <div class="d-flex align-items-center mt-3">
                                        <!-- Heart Reaction -->
                                        @auth
                                            <form method="POST" action="{{ route('comments.react', $comment->id) }}" class="reaction-form me-3">
                                                @csrf
                                                <input type="hidden" name="reaction" value="heart">
                                                <button type="submit" class="btn btn-link p-0 {{ $comment->isReactedByUser() ? 'text-danger' : '' }}">
                                                    <i class="bi bi-heart"></i> <span class="reaction-count">{{ $comment->reactions->count() }}</span>
                                                </button>
                                            </form>
                                        @endauth
            
                                        <!-- Edit and Delete Icons -->
                                        @auth
                                            @if(Auth::user()->id == $comment->user_id || Auth::user()->is_admin)
                                                <div class="d-flex align-items-center">
                                                    <button type="button" class="btn btn-link me-2 edit-button"><i class="bi bi-pencil"></i></button>
                                                    <form method="POST" action="{{ route('comments.destroy', $comment->id) }}" class="delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link text-danger delete-btn"><i class="bi bi-trash"></i></button>
                                                    </form>
                                                </div>
                                                <!-- Edit Form (Initially hidden) -->
                                                <div class="edit-form mt-3 d-none">
                                                    <form method="POST" action="{{ route('comments.update', $comment->id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3 mx-3">
                                                            <textarea class="form-control comment-input" name="comment" rows="3" required style="border: 1px solid rgba(15, 15, 15, 0.274)">{{ $comment->comment }}</textarea>
                                                        </div>
                                                        <div class="d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-link text-info border-0 me-2 submit-btn">
                                                                <i class="bi bi-check"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-link text-danger cancel-edit">
                                                                <i class="bi bi-x"></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            @endif
                                        @endauth
                                    </div>
            
                                    <!-- Reply Section -->
                                    <div class="mt-3">
                                        <button type="button" class="btn btn-link reply-button"><i class="bi bi-reply"></i> Reply</button>
                                        <div class="reply-form d-none mt-2">
                                            <form method="POST" action="{{ route('replies.store', $comment->id) }}">
                                                @csrf
                                                <div class="d-flex">
                                                    @auth
                                                        <img src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('storage/profile_images/default.png') }}" class="rounded-circle me-2" alt="User Profile Picture" style="width: 40px; height: 40px; object-fit: cover;">
                                                    @endauth
                                                    <div class="flex-grow-1">
                                                        <textarea class="form-control comment-input" name="reply" rows="3" required style="border: 1px solid rgba(15, 15, 15, 0.274)"></textarea>
                                                    </div>
                                                </div>
                                                <div class="d-flex mt-2 justify-content-end">
                                                    <button type="submit" class="btn btn-link text-info border-0 me-2 submit-btn">
                                                        <i class="bi bi-check"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-link text-danger cancel-reply">
                                                        <i class="bi bi-x"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        
                                        <!-- Display Replies -->
                                        <div class="reply-container d-none">
                                            @if($comment->replies)
                                                @foreach($comment->replies as $reply)
                                                    <div class="reply mt-3 ms-5" data-reply-id="{{ $reply->id }}">
                                                        <div class="d-flex align-items-start">
                                                            <img src="{{ $reply->user->image ? asset('storage/' . $reply->user->image) : asset('storage/profile_images/default.png') }}" class="rounded-circle me-2" alt="User Profile Picture" style="width: 40px; height: 40px; object-fit: cover;">
                                                            <div class="flex-grow-1">
                                                                <p><strong>{{ $reply->user->name }}</strong></p>
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <div>
                                                                        <p class="comment-text mb-0">{{ $reply->comment }}</p>
                                                                    </div>
                                                                    @auth
                                                                        @if(Auth::user()->id == $reply->user_id || Auth::user()->is_admin)
                                                                            <!-- Delete Reply Button -->
                                                                            <form method="POST" action="{{ route('replies.destroy', $reply->id) }}" class="mb-0">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit" class="btn btn-link text-danger delete-btn ms-3"><i class="bi bi-trash"></i></button>
                                                                            </form>
                                                                        @endif
                                                                    @endauth
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
        </div>
    </div>
</div>

<x-footer/>

