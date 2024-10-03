@extends('layouts.admin')

@section('title', $settings->app_name . ' - Projects')

@section('content')
<div class="container">
    @if($settings->app_status)
    <h1>{{ $settings->app_name }} - Projects</h1>
    <a href="{{ route('projects.create') }}" class="btn btn-primary">Add New Project</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Image</th>
                <th>Content</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td>{{ $project->title }}</td>
                <td><img src="{{ asset('storage/' . $project->image) }}" width="100"></td>
                <td>{{ Str::limit($project->content, 80) }}</td>
                <td>{{ $project->date }}</td>
                <td>
                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Edit</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="setDeleteAction('{{ route('projects.destroy', $project->id) }}')">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <br></br>
    <div class="alert alert-danger" role="alert">
        <p>Sorry, The Site is Closed Now</p>
    </div>
    @endif
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this project?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form id="deleteForm" action="" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function setDeleteAction(action) {
        document.getElementById('deleteForm').action = action;
    }
</script>
@endsection
