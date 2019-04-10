@extends('layouts.app')

@section('content')

    <div class="container" style="margin-top:6%;">
        <div class="row">
            <div class="col-6">
                <div class="row justify-content-center">
                    <img src="https://s3.amazonaws.com/iknow_images/large_v1/1036548_large_v1_a9bc3ce83ca3e401c4d3691b5042c142.jpeg"
                         class="border rounded-circle shadow mb-5 bg-white rounded">
                </div>
                <div class="row justify-content-center">
                    <legend style="text-align: center">{{$user->name}}</legend>
                    <h6 style="margin-top: -10px;">{{$user->email}}</h6>
                </div>
            </div>

            <div class="col-6">
                <legend>Permissões:</legend>
                <br />
                @if(Session::get('sucess') != null)
                    <div class="alert alert-success" role="alert">
                        Permissões atualizadas com sucesso.
                    </div>
                @endif
                @if(!isset($permissions))
                    <div class="alert alert-danger" role="alert">
                        Atenção! Não conseguimos encontrar as permissões desse usuário. Contate o setor de TI.
                    </div>
                @endif
                <form action="/atualizaPermissao" method="post">

                    <!-- Hidden Inputs para passar 'false' caso o checkbox não seja selecionado -->
                    <input type="hidden" name="registerCourse" value="0">
                    <input type="hidden" name="approveDocuments" value="0">
                    <input type="hidden" name="viewDashboards" value="0">
                    <input type="hidden" name="subscriptionCourse" value="0">
                    <input type="hidden" name="editPermissions" value="0">

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="registerCourse" name="registerCourse" value="1"
                               @if(isset($permissions) && $permissions->registerCourse) checked @endif>
                        <label class="custom-control-label" for="registerCourse">Cadastrar um curso.</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="approveDocuments"
                               name="approveDocuments" value="1"
                               @if(isset($permissions) && $permissions->approveDocuments) checked @endif>
                        <label class="custom-control-label" for="approveDocuments">Aprovar documentações.</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="viewDashboards" name="viewDashboards" value="1"
                               @if(isset($permissions) && $permissions->viewDashboards) checked @endif>
                        <label class="custom-control-label" for="viewDashboards">Ver Dashboards.</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="subscriptionCourse" value="1"
                               name="subscriptionCourse"
                               @if(isset($permissions) && $permissions->subscriptionCourse) checked @endif>
                        <label class="custom-control-label" for="subscriptionCourse">Inscrever-se em um curso.</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="editPermissions" name="editPermissions" value="1"
                               @if(isset($permissions) && $permissions->editPermissions) checked @endif>
                        <label class="custom-control-label" for="editPermissions">Editar permissões.</label>
                    </div>

                    <input type="hidden" name="user_id" value="{{$user->id}}"/>
                    <input type="hidden" name="_token" value="{{{ csrf_token()  }}}" />
                    <br/>

                    <button type="submit" class="btn pull-right btn-primary">Atualizar Permissões</button>
                </form>
            </div>

        </div>
    </div>


    </div>



@endsection