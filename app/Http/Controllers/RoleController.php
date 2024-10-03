<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\Setting;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
{
    $roles = Role::all();
    $settings = Setting::first();
    return view('roles.index', compact('roles','settings'));
}

public function create()
{
    $permissions = Permission::all();
    $settings = Setting::first();
    return view('roles.create', compact('permissions','settings'));
}
// public function store(Request $request)
// {
//     $role = Role::create($request->only('name'));
//     $role->permissions()->sync($request->permissions);
//     return redirect()->route('roles.index');
// }

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|unique:roles,name',
        'permissions' => 'array',
    ]);

    $role = Role::create($request->only('name'));
    $role->permissions()->sync($request->permissions);

    return redirect()->route('roles.index')->with('success', 'Role created successfully.');
}

public function edit(Role $role)
{
    $permissions = Permission::all();
    $settings = Setting::first();    
    return view('roles.edit', compact('role', 'permissions','settings'));
}

public function update(Request $request, Role $role)
{
    $role->update($request->only('name'));
    $role->permissions()->sync($request->permissions);
    return redirect()->route('roles.index');
}

public function destroy(Role $role)
{
    $role->delete();
    return redirect()->route('roles.index');
}
}
