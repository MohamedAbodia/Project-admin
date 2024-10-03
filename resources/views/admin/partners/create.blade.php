@extends('layouts.admin')

@section('title',$settings->app_name .  '- Create Partner')

@section('content')
<div class="container">
    @if($settings->app_status)
    <h1>{{  $settings->app_name }}- Create New Partners</h1>
    <form action="{{ route('partners.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>
        <div class="form-group">
            <label for="logo">Logo</label>
            <input type="file" name="logo" class="form-control" id="logo" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @else
    <br></br>
        <div class="alert alert-danger" role="alert">
        <p>Sorry , The Site is Closed Now</p>
        </div>
    @endif
    </div>
</div>
@stop
