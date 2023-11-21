@extends('admin.admin')

@section('contents')

<div class="container mx-5 px-5">

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
                                    <form method="POST" action="{{ route('updatevalide', ['id' => $v->id, 'status' => 'true']) }}" onsubmit="return confirm('Are you sure you want to delete this role?');">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Pas Validé</button>
                                    </form>
                                </td>
                            @else
                                <td>
                                    <form method="POST" action="{{ route('updatevalide', ['id' => $v->id, 'status' => 'false']) }}" onsubmit="return confirm('Are you sure you want to delete this role?');">
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
