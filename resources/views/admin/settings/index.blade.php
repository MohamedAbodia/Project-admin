@extends('layouts.admin')
@section('title', $settings->app_name . '- Settings')
@section('content')
<div class="container">
<h1>{{ $settings->app_name }} - Settings</h1>
    <a href="{{ route('settings.create') }}" class="btn btn-primary mb-3">Add New Settings</a>
    @if($settings)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Logo</th>
                    <th>App Name</th>
                    <th>App Status</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Social Media Links</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img src="{{ asset('storage/' . $settings->logo) }}" alt="Logo" width="50"></td>
                    <td>{{ $settings->app_name }}</td>
                    <td>{{ $settings->app_status ? 'Active' : 'Non-Active' }}</td>
                    <td>{{ $settings->email }}</td>
                    <td>{{ $settings->phone }}</td>
                    <td>{{ $settings->social_media_links }}</td>
                    <td>
                        <a href="{{ route('settings.edit', $settings->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    @else
        <p>No settings found.</p>
    @endif
</div>
@stop
