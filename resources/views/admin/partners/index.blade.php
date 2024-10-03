@extends('layouts.admin')

@section('title',  $settings->app_name .'- Partners')

@section('content')
<div class="container">
    @if($settings->app_status)
    <h1>{{ $settings->app_name }} - Partners</h1>
    <a href="{{ route('partners.create') }}" class="btn btn-primary mb-3">Add New Partner</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Logo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($partners as $partner)
                <tr>
                    <td>{{ $partner->name }}</td>
                    <td><img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" width="50"></td>
                    <td>
                        <a href="{{ route('partners.edit', $partner->id) }}" class="btn btn-warning">Edit</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="setDeleteAction('{{ route('partners.destroy', $partner->id) }}')">Delete</button>
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
                Are you sure you want to delete this partner?
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
