@extends('layouts.admin')
@section('title', $settings->app_name . ' - Edit Service')
@section('content')
<div class="container">
    <h1>{{ $settings->app_name }} - Edit Services</h1>
    <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $service->title }}" required>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control" id="image">
            <img src="{{ asset('storage/' . $service->image) }}" width="100" alt="Current Image">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" id="content" rows="5" required>{{ $service->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update service</button>
    </form>
</div>
@endsection
