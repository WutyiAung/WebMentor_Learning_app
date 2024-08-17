<x-admin-layout>
    <main>
        <div class="container-fluid px-2">
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <div>
                        <i class="fas fa-user me-1"></i>
                        User Details
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Name:</strong> {{ $user->name }}
                    </div>
                    <div class="mb-3">
                        <strong>Email:</strong> {{ $user->email }}
                    </div>
                    <div class="mb-3">
                        <strong>Role:</strong> 
                        {{ $user->is_admin ? 'Admin' : 'User' }}
                    </div>
                    <div class="mb-3">
                        <p>Profile Image:</p> 
                        @if ($user->image)
                        <img src="{{ asset('storage/' . $user->image) }}" alt="{{ $user->name }}" class="img-fluid rounded-circle" style="max-width: 100px; height: auto;">
                    @else
                        <span>No image uploaded</span>
                    @endif
                    
                    </div>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary">Back to List</a>
                </div>
            </div>
        </div>
    </main>
</x-admin-layout>
