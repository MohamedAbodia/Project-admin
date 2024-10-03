@extends('layouts.admin')

@section('title',$settings->app_name . ' - Create Project')

@section('content')
<div class="container">
    <h1>Create New Project</h1>
    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" required>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control" id="image" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" id="content" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" id="date" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Project</button>
    </form>
</div>
@endsection