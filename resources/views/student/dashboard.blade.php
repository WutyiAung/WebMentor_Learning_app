<x-header/>
<div class="container mt-5">
    <div class="row">
        <!-- User Profile Section -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    @if(auth()->user()->image)
                        <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="Profile Picture" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                    @else
                    <img src="/storage/profile_images/default.png" alt="Profile Image"  class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                    @endif
                    <h4>{{ auth()->user()->name }}</h4>
                    <p>{{ auth()->user()->email }}</p>
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary mt-3">Edit Profile</a>
                </div>
            </div>
        </div>
        <!-- Courses Section -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Your Courses</h4>
                </div>
                <div class="card-body">
                    @if($enrollments->isEmpty())
                        <p>No courses enrolled yet.</p>
                    @else
                        <div class="row">
                            @foreach($enrollments as $course)
                                <div class="col-md-6 mb-4">
                                    <a href="{{ route('courses.showDetails', $course->id) }}" class="text-decoration-none">
                                        <div class="card">
                                            @if($course->image)
                                                <img src="{{ asset('storage/' . $course->image) }}" class="card-img-top" alt="{{ $course->title }}" style="width: 100%; height: 200px; object-fit: cover;">
                                            @else
                                                <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Default Course Image" style="width: 100%; height: 200px; object-fit: cover;">
                                            @endif
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $course->title }}</h5>
                                                <p class="card-text">Level: {{ $course->level }}</p>
                                                <p class="card-text">Enrolled {{ $course->pivot->created_at ? $course->pivot->created_at->diffForHumans() : 'on N/A' }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<x-footer/>
