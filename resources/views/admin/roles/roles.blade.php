@extends('admin.admin')

@section('contents')
<div class="container mx-4 px-5">
    <form action="{{ route('ajouter_role') }}" method="post" class="mb-3">
        @csrf
        <div class="input-group">
            <input type="text" name="label" id="label_role" class="form-control" placeholder="Enter Role" required>
            <div class="input-group-append">
                <button class="btn btn-info" type="submit">Add Role</button>
            </div>
        </div>
    </form>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Label</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $v)
                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->label}}</td>
                    <td>
                        <a href="{{route('edit_role', $v->id)}}" class="btn btn-warning">Update</a>
                    </td>
                    <td>
                        <form action="{{route('Delete_role', $v->id)}}" method="post" onsubmit="return confirm('Are you sure you want to delete this role?');">
                            @csrf
                            @method("delete")
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
