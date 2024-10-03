@extends('layouts.admin')
@section('title','Create Role')
@section('content')
    <div class="container">
        <h1>Create Role</h1>
        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Role Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="permissions">Assign Permissions</label>
                <div class="checkbox">
                    @foreach($permissions as $permission)
                        <label>
                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                            {{ $permission->name }}
                        </label><br>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
