<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10); // Fetch all users or apply any filters needed
        return view('users.index', compact('users'));
    }
    public function create()
    {
        return view('users.create'); // This view will be used to display the user creation form
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8', // Ensure password validation
            'role' => 'required|in:admin,user',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'email', 'role']);
        $data['is_admin'] = ($request->role === 'admin') ? 1 : 0;
        $data['password'] = Hash::make($request->password); // Hash the password

        // Handle image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('profile_images', 'public');
            $data['image'] = $path;
        }

        User::create($data);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show($id)
    {
        $user = User::findOrFail($id); // Fetch user by ID
        return view('users.show', compact('user')); // Pass user data to view
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8', // Password is optional for updates
            'role' => 'required|in:admin,user',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);
    
        $data = $request->only(['name', 'email', 'role']);
        $data['is_admin'] = ($request->role === 'admin') ? 1 : 0;
    
        // Update password if provided
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
    
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($user->image && \Storage::exists('public/' . $user->image)) {
                \Storage::delete('public/' . $user->image);
            }
    
            $path = $request->file('image')->store('profile_images', 'public');
            $data['image'] = $path;
        }
    
        $user->update($data);
    
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id); // Find the user by ID
        $user->delete(); // Delete the user

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

}
