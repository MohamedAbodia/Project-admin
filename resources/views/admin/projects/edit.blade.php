@extends('layouts.admin')

@section('title', $settings->app_name . '- Edit Project')

@section('content')
<div class="container">
    <h1>Edit Project</h1>
    <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $project->title }}" required>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control" id="image">
            <img src="{{ asset('storage/' . $project->image) }}" width="100" alt="Current Image">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" id="content" rows="5" required>{{ $project->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" id="date" value="{{ $project->date }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Project</button>
    </form>
</div>
@endsection
