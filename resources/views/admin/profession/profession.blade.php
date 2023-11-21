@extends('admin.admin')

@section('contents')
<div class="container mx-4 px-5">
            <form action="{{ route('ajouter_profession') }}" method="post">
                @csrf
                <div class="input-group">
                    <input type="text" name="label" id="label_profession" class="form-control" placeholder="Enter Profession" required>
                    <button class="btn btn-info" type="submit">Add Profession</button>
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
            @foreach($profession as $v)
                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->label}}</td>
                    <td>
                        <a href="{{route('edit_profession', $v->id)}}" class="btn btn-warning">Update</a>
                    </td>
                    <td>
                        <form action="{{route('Delete_profession', $v->id)}}" method="post" onsubmit="return confirm('Are you sure you want to delete this role?');">
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
