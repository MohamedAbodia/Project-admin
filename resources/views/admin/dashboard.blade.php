@extends('layouts.admin')
@section('title','Admin Panel')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $userDetails['name'] }}</h3>
                    <p>{{ $userDetails['email'] }}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href="{{ asset('account') }}" class="small-box-footer">Profile <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $userDetails['created_at'] }}</h3>
                    <p>Member Since</p>
                </div>
                <div class="icon">
                    <i class="ion ion-calendar"></i>
                </div>
                <a href="{{ asset('admin/settings') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $userDetails['role'] }}</h3>
                    <p>Role</p>
                </div>
                <div class="icon">
                    <i class="ion ion-key"></i>
                </div>
                <a href="{{ asset('admin/settings') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $settings->app_name }}</h3>
                    <p>Site Name</p>
                </div>
                <div class="icon">
                    <i class="ion ion-log-in"></i>
                </div>
                <a href="{{ asset('admin/settings') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
</div>
@endsection
