@extends('layouts.admin')
@section('title','Edit Role')
@section('content')
    <div class="container">
        <h1>Edit Role</h1>
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Role Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $role->name }}" required>
            </div>
            <div class="form-group">
                <label for="permissions">Assign Permissions</label>
                <div class="checkbox">
                    @foreach($permissions as $permission)
                        <label>
                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" 
                            {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                            {{ $permission->name }}
                        </label><br>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
