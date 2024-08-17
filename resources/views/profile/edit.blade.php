<x-app-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Update Password Form -->
                <div class="card mb-4 border-light">
                    <div class="card-body text-center">
                        <div class="mb-4">
                            <i class="fas fa-key text-4xl text-green-500"></i>
                        </div>
                        <h3 class="card-title text-green-600 mb-4">Update Your Profile</h3>
                        <p class="text-muted mb-4">Update your account's profile information and email address.</p>
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <!-- User Enrollments (hidden for admins) -->
                @if (auth()->user()->is_admin == 0)
                    <div class="card mb-4 border-light">
                        <div class="card-body text-center">
                            <div class="mb-4">
                                <i class="fas fa-graduation-cap text-4xl text-blue-500"></i>
                            </div>
                            <h3 class="card-title text-blue-600 mb-4">Your Enrollments</h3>
                            <p class="text-muted mb-4">Check your course enrollments and progress.</p>

                            <!-- Check if there are courses -->
                            @if ($courses && count($courses) > 0)
                                <div class="row">
                                    @foreach ($courses as $course)
                                        <div class="col-md-12 mb-4">
                                            <div class="card border-light h-100">
                                                <div class="card-body d-flex align-items-center justify-content-between">
                                                    <div>
                                                        <h5 class="card-title font-weight-bold">{{ $course['title'] ?? 'No Title' }}</h5>
                                                        <p class="card-text text-muted">{{ Str::limit($course['description'] ?? 'No Description available.', 100) }}</p>
                                                        <small class="text-muted">
                                                            Enrolled on: {{ \Carbon\Carbon::parse($course['enrollment_time'] ?? now())->format('M d, Y') }}
                                                        </small>
                                                    </div>
                                                    <div>
                                                        <a href="{{ route('courses.showDetails', $course['id'] ?? '#') }}" class="btn btn-primary d-flex align-items-center">
                                                            <i class="fas fa-info-circle mr-2"></i> View Details
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-muted">You have no enrollments at this time.</p>
                            @endif
                        </div>
                    </div>
                @endif

                <!-- Delete User Form -->
                <div class="card border-light">
                    <div class="card-body text-center">
                        <div class="mb-4">
                            <i class="fas fa-trash-alt text-4xl text-red-500"></i>
                        </div>
                        <h3 class="card-title text-red-600 mb-4">Delete Your Account</h3>
                        <p class="text-muted mb-4">If you wish to permanently delete your account, please proceed with the form below.</p>
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    .card {
        border: 1px solid #e5e7eb;
        border-radius: 0.375rem;
        box-shadow: none;
    }
    
    .card-title {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .text-green-600 {
        color: #16a34a;
    }
    .text-blue-600 {
        color: #3b82f6;
    }
    .text-red-600 {
        color: #ef4444;
    }

    .text-muted {
        font-size: 0.875rem;
        color: #6c757d;
    }

    .btn-primary {
        background-color: #3b82f6;
        border: none;
        padding: 0.75rem 1.25rem;
        border-radius: 0.375rem;
        display: inline-flex;
        align-items: center;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #2563eb;
    }

    .btn-primary i {
        margin-right: 0.5rem;
    }

    input[type="text"], input[type="email"], input[type="password"], input[type="file"] {
        border: 2px solid #d1d5db;
        border-radius: 0.375rem;
        padding: 0.5rem;
        background-color: #f9fafb;
        color: #1f2937;
    }

    input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus {
        border-color: #3b82f6;
        outline: none;
        box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.3);
    }
</style>
