@extends('layouts.admin')

@section('title', $settings->app_name . '- Create Settings')


@section('content')
<div class="container">
<h1>{{ $settings->app_name }} - Create Settings</h1>
    <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="logo">Logo</label>
            <input type="file" name="logo" class="form-control" id="logo" required>
        </div>
        <div class="form-group">
            <label for="app_name">App Name</label>
            <input type="text" name="app_name" class="form-control" id="app_name" required>
        </div>
        <div class="form-group">
            <label for="app_status">App Status</label>
            <select name="app_status" class="form-control" id="app_status" required>
                <option value="1">Active</option>
                <option value="0">Non-Active</option>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" id="phone" required>
        </div>
        <div class="form-group">
            <label for="social_media_links">Social Media Links (JSON Ex: "facebook": "https://www.fb.me/mohamed.ibrahim.2036",
                )</label>
            <textarea name="social_media_links" class="form-control" id="social_media_links" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@stop
