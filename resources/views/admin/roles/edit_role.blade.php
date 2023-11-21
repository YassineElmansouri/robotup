@extends('admin.admin')

@section('contents')

<div class="container mt-4">
    <h2>Update Role</h2>
    
    <form action="{{ route('update_role', ['id' => $role->id]) }}" method="post">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="label">Role Label:</label>
            <input type="text" name="label" id="label" class="form-control" value="{{ $role->label }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Role</button>
    </form>
</div>

@endsection