@extends('layouts.admin')

@section('title', $settings->app_name . ' - Edit Partner')

@section('content')
<div class="container">
    @if($settings->app_status)
    <h1>{{ $settings->app_name }} - Edit Partner</h1>
    <form action="{{ route('partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $partner->name }}" required>
        </div>
        <div class="form-group">
            <label for="logo">Logo</label>
            <input type="file" name="logo" class="form-control" id="logo">
            <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" width="100">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    @else
    <br></br>
        <div class="alert alert-danger" role="alert">
        <p>Sorry , The Site is Closed Now</p>
        </div>
    @endif
</div>
@stop
