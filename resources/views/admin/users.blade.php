@extends('admin.admin')

@section('contents')

<div class="container mx-5 px-5">
    <form action="{{ route('recherche_user') }}" method="post" class="mb-3">
        @csrf
        <div class="input-group">
            <input type="text" name="user_name" id="recherche_user" class="form-control" placeholder="Recherche par nom or prenom">
            <div class="input-group-append">
                <button class="btn btn-info" type="submit">Recherche</button>
            </div>
        </div>
    </form>
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
                        <th>Update</th>
                        <th>Suspendue</th>
                        <th>Validated by</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $v)
                        <tr class="{{ $v->suspended ? 'table-danger' : '' }}">
                            <td>{{ $v->name }}</td>
                            <td>{{ $v->prenom }}</td>
                            <td>{{ $v->telephone }}</td>
                            <td>{{ $v->roleID }}</td>
                            @foreach($professions as $profession)
                                @if($profession->id === $v->professionID)
                                    <td>{{ $profession->label }}</td>
                                @endif
                            @endforeach
                            @if($v->valide == false)
                                <td>
                                    <form method="POST" action="{{ route('updatevalide', ['id' => $v->id, 'status' => 'true']) }}" onsubmit="return confirm('êtes-vous sûr de vouloir valider cet utilisateur?');">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Pas Validé</button>
                                    </form>
                                </td>
                            @else
                                <td>
                                    <form method="POST" action="{{ route('updatevalide', ['id' => $v->id, 'status' => 'false']) }}" onsubmit="return confirm('êtes-vous sûr de vouloir supprimer la validation de cet utilisateur?');">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Validé</button>
                                    </form>
                                </td>
                            @endif
                            <td>
                                <a href="{{route('edit_user', $v->id)}}" class="btn btn-warning">Update</a>
                            </td>
                            @if($v->suspended == false)
                                <td>
                                    <form method="POST" action="{{ route('updatesuspendue', ['id' => $v->id, 'status' => 'true']) }}" onsubmit="return confirm('es-tu sûr de vouloir suspendre cet utilisateur?');">
                                        @csrf
                                        <button type="submit" class="btn btn-success text-center" style="background: transparent; border: none; display: flex; justify-content: center; align-items: center;">
                                            <img class="mb-1" src="{{asset('icons/user_suspendue/suspended.png')}}" alt="" srcset="">
                                        </button>
                                    </form>
                                </td>
                            @else
                            
                                <td>
                                    <form method="POST" action="{{ route('updatesuspendue', ['id' => $v->id, 'status' => 'false']) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer la suspension de cet utilisateur?');">
                                        @csrf
                                        <button type="submit" class="btn btn-danger" style="background: transparent; border: none; display: flex; justify-content: center; align-items: center;">
                                            <img class="mb-1" src="{{asset('icons/user_suspendue/suspended.png')}}" alt="" srcset="">
                                        </button>
                                    </form>
                                </td>
                            
                            @endif
                            <td>
                                @foreach($user as $f)
                                    @if($v->validated_by == $f->id)
                                        {{$f->name}}
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
