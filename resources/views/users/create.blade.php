@extends('layouts.admin')
@section('title','Create User')
@section('content')
    <div class="container">
        <h1>Create User</h1>
        <form action="route('users.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name ?? '' }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email ?? '' }}" required>
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" name="password" id="pass" class="form-control" value="{{ $user->password ?? '' }}" required>
            </div>
            <div class="form-group">
                <label for="role">Assign Role</label>
                <select name="role" id="role" class="form-control">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ isset($user) && $user->roles->contains($role->id) ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
