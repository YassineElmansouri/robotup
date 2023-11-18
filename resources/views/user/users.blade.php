@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('ajouter_role') }}" method="post" class="mb-3">
                @csrf
                <div class="input-group">
                    <input type="text" name="label" id="label_role" class="form-control" placeholder="Enter Role" required>
                    <button class="btn btn-info" type="submit">Add Role</button>
                </div>
            </form>

            <form action="{{ route('ajouter_profession') }}" method="post">
                @csrf
                <div class="input-group">
                    <input type="text" name="label" id="label_profession" class="form-control" placeholder="Enter Profession" required>
                    <button class="btn btn-info" type="submit">Add Profession</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Telephone</th>
                        <th>Role</th>
                        <th>Profession</th>
                        <th>Valide</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $v)
                        <tr>
                            <td>{{ $v->name }}</td>
                            <td>{{ $v->prenom }}</td>
                            <td>0{{ $v->telephone }}</td>
                            <td>{{ $v->roleID }}</td>
                            @foreach($professions as $profession)
                                @if($profession->id === $v->professionID)
                                    <td>{{ $profession->label }}</td>
                                @endif
                            @endforeach
                            @if($v->valide == false)
                                <td>
                                    <form method="POST" action="{{ route('updatevalide', ['id' => $v->id, 'status' => 'true']) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Pas Validé</button>
                                    </form>
                                </td>
                            @else
                                <td>
                                    <form method="POST" action="{{ route('updatevalide', ['id' => $v->id, 'status' => 'false']) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Validé</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
