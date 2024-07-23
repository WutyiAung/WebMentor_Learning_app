<x-header />

<div class="container my-5">  
    <!-- Display session messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('info'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <!-- Sidebar Section -->
        <div class="col-md-4">
            <!-- Related Courses -->
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="card-title">Related Courses</h4>
                    <ul class="list-group list-group-flush">
                        @foreach ($relatedCourses as $relatedCourse)
                            <li class="list-group-item">
                                <a href="{{ route('courses.showDetails', $relatedCourse->id) }}">{{ $relatedCourse->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Enroll Button -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Enroll Now</h4>
                    <form action="{{ route('courses.enroll', $course->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-block">Enroll in this course</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Course Details Section -->
        <div class="col-md-8">
            <h1 class="mb-4">{{ $course->title }}</h1>
            <p class="lead">{{ $course->description }}</p>

            <!-- Display YouTube content -->
            @if($course->youtube_playlist_id)
                <div class="embed-responsive embed-responsive-16by9 mb-4">
                    <iframe width="100%" height="400" src="https://www.youtube.com/embed/videoseries?list={{ $course->youtube_playlist_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            @else
                <div class="embed-responsive embed-responsive-16by9 mb-4">
                    <iframe width="100%" height="400" src="{{ $course->url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            @endif

            <!-- Additional course details -->
            <div class="mb-4">
                <p><strong>Source:</strong> {{ $course->source }}</p>
                <p><strong>Category:</strong> {{ $course->category->name }}</p>
                @if($course->level)
                    <p><strong>Level:</strong> {{ $course->level }}</p>
                @endif
                @if($course->language)
                    <p><strong>Language:</strong> {{ $course->language }}</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Comments Section -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Comments</h5>
                        
                        <!-- Display success message for comments -->
                        @if(session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- Comment Form -->
                        <form method="POST" action="{{ route('courses.comments.store', $course->id) }}">
                            @csrf
                            <div class="d-flex align-items-start mb-3">
                                @auth
                                    <img src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('storage/profile_images/default.png') }}" class="rounded-circle me-2" alt="User Profile Picture" style="width: 50px; height: 50px; object-fit: cover;">
                                @endauth
                                <div class="flex-grow-1">
                                    <textarea class="form-control" id="comment" name="comment" rows="5" placeholder="Leave a comment..." required></textarea>
                                    <button type="submit" class="btn btn-primary mt-2">Comment</button>
                                </div>
                            </div>
                        </form>

                        <hr>

                        <!-- List of Comments -->
                        @foreach($course->comments as $comment)
                            <div class="comment mb-3" data-comment-id="{{ $comment->id }}">
                                <div class="d-flex align-items-start">
                                    <img src="{{ $comment->user->image ? asset('storage/' . $comment->user->image) : asset('storage/profile_images/default.png') }}" class="rounded-circle me-2" alt="User Profile Picture" style="width: 50px; height: 50px; object-fit: cover;">
                                    <div>
                                        <p><strong>{{ $comment->user->name }}</strong> on {{ $comment->created_at->format('M d, Y') }}</p>
                                        <p class="comment-text">{{ $comment->comment }}</p>

                                        <div class="d-flex align-items-center mt-3">
                                            <!-- Heart Reaction -->
                                            @auth
                                                <form method="POST" action="{{ route('comments.react', $comment->id) }}" class="me-3">
                                                    @csrf
                                                    <input type="hidden" name="reaction" value="heart">
                                                    <button type="submit" class="btn btn-link p-0 {{ $comment->isReactedByUser() ? 'text-danger' : '' }}">
                                                        <i class="bi bi-heart"></i> <span class="reaction-count">{{ $comment->reactions()->count() }}</span>
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
                                                            <div class="mb-3">
                                                                <textarea class="form-control" name="comment" rows="3" required>{{ $comment->comment }}</textarea>
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
                                                            <textarea class="form-control" name="reply" rows="2" placeholder="Write a reply..." required></textarea>
                                                            <button type="submit" class="btn btn-primary mt-2">Reply</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Display Replies -->
                                            @foreach($comment->replies as $reply)
                                                <div class="reply mt-2 ps-4">
                                                    <div class="d-flex align-items-start">
                                                        <img src="{{ $reply->user->image ? asset('storage/' . $reply->user->image) : asset('storage/profile_images/default.png') }}" class="rounded-circle me-2" alt="User Profile Picture" style="width: 40px; height: 40px; object-fit: cover;">
                                                        <div>
                                                            <p><strong>{{ $reply->user->name }}</strong> on {{ $reply->created_at->format('M d, Y') }}</p>
                                                            <p class="reply-text">{{ $reply->reply }}</p>

                                                            @auth
                                                                @if(Auth::user()->id == $reply->user_id || Auth::user()->is_admin)
                                                                    <div class="d-flex align-items-center">
                                                                        <button type="button" class="btn btn-link me-2 edit-reply-button"><i class="bi bi-pencil"></i></button>
                                                                        <form method="POST" action="{{ route('replies.destroy', $reply->id) }}" class="delete-reply-form">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="btn btn-link text-danger delete-reply-btn"><i class="bi bi-trash"></i></button>
                                                                        </form>
                                                                    </div>
                                                                    <!-- Edit Reply Form (Initially hidden) -->
                                                                    <div class="edit-reply-form mt-2 d-none">
                                                                        <form method="POST" action="{{ route('replies.update', $reply->id) }}">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <div class="mb-2">
                                                                                <textarea class="form-control" name="reply" rows="2" required>{{ $reply->reply }}</textarea>
                                                                            </div>
                                                                            <div class="d-flex justify-content-end">
                                                                                <button type="submit" class="btn btn-link text-info border-0 me-2 submit-reply-btn">
                                                                                    <i class="bi bi-check"></i>
                                                                                </button>
                                                                                <button type="button" class="btn btn-link text-danger cancel-reply-edit">
                                                                                    <i class="bi bi-x"></i>
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                @endif
                                                            @endauth
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
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
</div>

<x-footer />
