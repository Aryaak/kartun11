<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $search = request('search');

        $users = User::where('name', 'LIKE', "%$search%")
            ->paginate(10);

        return view('pages.users.index', compact(
            'search',
            'users'
        ));
    }

    public function create()
    {
        $roles = Role::all();

        return view('pages.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->all();

        if ($request->hasFile('photo')) {
            $filePath = $request->file('photo')->store('images/user', 'public');
        }

        $user = new User;
        $user->name = $validated['name'];
        $user->phone = $validated['phone'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->role_uuid = $validated['role_uuid'];
        $user->position = $validated['position'];
        $user->photo = $filePath;

        $user->save();

        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }


    public function edit(User $user)
    {
        $roles = Role::all();
        return view('pages.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->all();

        if ($request->hasFile('photo')) {
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }
            $filePath = $request->file('photo')->store('images/user', 'public');
            $user->photo = $filePath;
        }

        $user->name = $validated['name'];
        $user->phone = $validated['phone'];
        $user->email = $validated['email'];
        if ($request->filled('password')) {
            $user->password = Hash::make($validated['password']);
        }
        $user->role_uuid = $validated['role_uuid'];
        $user->position = $validated['position'];

        $user->save();

        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
}
