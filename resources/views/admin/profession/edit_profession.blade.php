@extends('admin.admin')

@section('contents')

<div class="container mt-4">
    <h2>Update Profession</h2>
    
    <form action="{{ route('update_profession', ['id' => $profession->id]) }}" method="post">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="label">Profession Label:</label>
            <input type="text" name="label" id="label" class="form-control" value="{{ $profession->label }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Profession</button>
    </form>
</div>

@endsection