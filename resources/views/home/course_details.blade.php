<x-header />

<div class="container my-5">
    <div class="row">
        <!-- Sidebar Section -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="card-title">Related Courses</h4>
                    <!-- Add related courses or any other relevant content here -->
                    <ul class="list-group list-group-flush">
                        @foreach ($relatedCourses as $relatedCourse)
                            <li class="list-group-item">
                                <a href="{{ route('courses.show', $relatedCourse->id) }}">{{ $relatedCourse->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Enroll Now</h4>
                    <a href="#" class="btn btn-primary btn-block">Enroll in this course</a>
                </div>
            </div>
        </div>

        <!-- Course Details Section -->
        <div class="col-md-8">
            <h1 class="mb-4">{{ $course->title }}</h1>
            <p class="lead">{{ $course->description }}</p>

            <!-- Display YouTube playlist if available -->
            @if($course->youtube_playlist_id)
                <div class="embed-responsive embed-responsive-16by9 mb-4">
                    <iframe width="100%" height="400" src="https://www.youtube.com/embed/videoseries?list={{ $course->youtube_playlist_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            @else
                <!-- Display YouTube video if no playlist is available -->
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
</div>

<x-footer />

<!-- Additional CSS -->
<style>
    .embed-responsive-16by9 {
        position: relative;
        display: block;
        width: 100%;
        padding: 0;
        overflow: hidden;
        padding-top: 56.25%;
    }
    .embed-responsive-16by9 iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    .card-title {
        font-size: 1.25rem;
        margin-bottom: 15px;
    }
    .list-group-item a {
        text-decoration: none;
        color: #007bff;
    }
    .list-group-item a:hover {
        text-decoration: underline;
    }
</style>
