<!-- resources/views/enrollments/create.blade.php -->
<x-admin-layout>
    <div class="container mx-5 mt-5 col-md-10">
        <h1>Create Enrollment</h1>
        
        <form action="{{ route('enrollments.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="user_id" class="form-label">User</label>
                <select id="user_id" name="user_id" class="form-control" required>
                    <option value="">Select User</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="course_id" class="form-label">Course</label>
                <select id="course_id" name="course_id" class="form-control" required>
                    <option value="">Select Course</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                    @endforeach
                </select>
            </div>
            
            <!-- Button Group -->
            <div class="d-flex justify-content-end">
                <a href="{{ route('enrollments.index') }}" class="btn btn-secondary me-2">Back</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</x-admin-layout>
