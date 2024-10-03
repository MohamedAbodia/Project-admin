@extends('layouts.admin')
@section('title', $settings->app_name . ' - Create Service')
@section('content')
<div class="container">
    <h1>{{ $settings->app_name }} - Create New Service</h1>
    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
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
        <button type="submit" class="btn btn-primary">Create Service</button>
    </form>
</div>
@endsection