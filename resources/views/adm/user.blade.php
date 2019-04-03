@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row mx-auto justify-content-center" style="width: 300px; margin-top: 30px;">
                    <img src="https://s3.amazonaws.com/iknow_images/large_v1/1036548_large_v1_a9bc3ce83ca3e401c4d3691b5042c142.jpeg"
                         class="border rounded-circle shadow mb-5 bg-white rounded">
                </div>
                <div class="row mx-auto justify-content-center" style="width: 400px; margin-top: -20px; padding-bottom:20px;">
                    <legend style="text-align: center">{{$user->name}}</legend>
                    <h6 style="margin-top: -10px; margin-left: 2px;">{{$user->email}}</h6>
                </div>
                <div class="row mx-auto border-top border-bottom"
                     style="width: 350px; padding-top: 20px; padding-bottom: 20px;">

                    Usuário desde: {{  strftime("%d/%m/%Y",strtotime($user->created_at)) }}
                    <br/>
                    Último login:

                    @if(isset($lastLogin->created_at))
                        {{ strftime("%d/%m/%Y às %Hh%Mmin",strtotime($lastLogin->created_at)) }}
                    @else
                        Nunca acessou
                    @endif

                    <br/>
                    <br/>
                    Data de Nascimento:

                    @if(isset($extraInfos->dateBirth))
                        {{$extraInfos->dateBirth}}
                    @else
                        Não Informado
                    @endif

                    <br/>
                    Telefone:

                    @if(isset($extraInfos->phone))
                        {{$extraInfos->phone}}
                    @else
                        Não Informado
                    @endif

                    <br/>
                    <br/>
                    <div style="width: 100%;">Inscrito em <strong>{{ $numCursos }}</strong> Cursos</div>
                </div>
                <div class="row mx-auto" style="width: 350px; margin-top: 20px; padding-bottom: 50px; ">
                    <legend>Permissões:</legend>

                    <ul class="list-group" style="width: 100%">
                        @if($permissions->registerCourse)
                            <li class="list-group-item">Cadastrar Um Curso</li>
                        @endif
                        @if($permissions->approveDocuments)
                            <li class="list-group-item">Aprovar Documentação</li>
                        @endif
                        @if($permissions->viewDashboards)
                            <li class="list-group-item">Acessar os Dashboards</li>
                        @endif
                        @if($permissions->subscriptionCourse)
                            <li class="list-group-item">Inscrever-se em um curso</li>
                        @endif
                        @if($permissions->editPermissions)
                            <li class="list-group-item">Editar Permissões</li>
                        @endif
                        @if(!isset($permissions))

                        @endif
                        <a href="/editPermissions/{{$id}}"><button type="button" class="btn btn-dark" style="width: 100%">Alterar Permissões</button></a>
                    </ul>
                </div>
            </div>
        </div>
    </div>



@endsection