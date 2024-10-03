<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class ManageUsersController extends Controller
{
    public function index()
{
    $users = User::with('roles')->get();
    $settings = Setting::first();
    return view('users.index', compact('users','settings'));
}

public function create()
{
    $roles = Role::all();
    $settings = Setting::first();
    return view('users.create', compact('roles','settings'));
}

public function store(Request $request)
{
    // dd($request);
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required',
        'role' => 'required|exists:roles,id',
    ]);

    $user = User::create($request->only('name', 'email', 'password'));
    $user->roles()->sync($request->role);

    return redirect()->route('users.index')->with('success', 'User created successfully.');
}

public function edit(User $user)
{
    $roles = Role::all();
    $settings = Setting::first();
    return view('users.edit', compact('user', 'roles','settings'));
}

public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'role' => 'required|exists:roles,id',
    ]);

    $user->update($request->only('name', 'email'));
    $user->roles()->sync($request->role);

    return redirect()->route('users.index')->with('success', 'User updated successfully.');
}

public function destroy(User $user)
{
    $user->delete();
    return redirect()->route('users.index')->with('success', 'User deleted successfully.');
}
}
