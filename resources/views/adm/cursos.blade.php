@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="right">
                        <a href="/cadastroCurso"><button type="button" class="btn btn-primary">Cadastrar Curso</button></a>
                    </div>
                </div>

                <table class="table table-bordered table-hover">
                    @if(count($cursos)<1)
                        <tr class="alert alert-danger">
                            <td align="center"><i>Não existem cursos cadastrados</i></td>
                        </tr>
                    @endif
                    @foreach($cursos as $c)
                        <tr>
                            <td>{{ $c->name }}</td>
                            <td>{{ $c->vacancies }} vagas</td>
                            <td>{{ $c->situation }}</td>
                            <td><a href="javascript:confirmaDelete( {{$c->id}}, '{{$c->name}}' )" title="Deletar Usuário"><i class="fas fa-trash-alt"></i></a></td>
                            <td><a href="/cursosAdm/{{$c->id}}"><i class="fas fa-search-plus" title="Mais Informações"></i></a></td>
                        </tr>
                    @endforeach
                </table>


            </div>
        </div>
    </div>

    <script>
        function confirmaDelete(id, nomeCurso){
            var response= confirm("Deseja mesmo excluir o curso "+nomeCurso+"?");
            if(response == true){
                window.location= "/deletaCurso/"+id;
            }else{
                //Nothing Happens
            }
        }
    </script>
@endsection
