@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <h2>Usuários:</h2>
                </div>

                <table class="table table-striped">
                    <thead>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">ID</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    </thead>
                    <tbody>
                    @if(count($usuarios)<2)
                        <tr class="alert alert-danger">
                            <td align="center"><i>Não existem usuários cadastrados além de você.</i></td>
                        </tr>
                    @endif
                    @foreach($usuarios as $u)
                        <tr>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>#{{ str_pad($u->id, 6, "0", STR_PAD_LEFT) }}</td>
                            <td><a href="/editPermissions/{{$u->id}}" title="Editar Permissões"><i class="fas fa-user-shield"></i></a></td>
                            <td><a href="admView/user/{{$u->id}}" title="Mais Informações"><i class="fas fa-search-plus"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>

@endsection