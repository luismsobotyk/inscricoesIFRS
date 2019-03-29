@extends('layouts.app')

@section('content')

    <div class="container border">
        <h3>{{$curso->name}}</h3>

        <div class="row">
            <div class="col">
                <div class="row" style="padding:10px;">
                    <blockquote class="blockquote">
                        <br />
                        <p class="mb-0">{{$curso->description}}</p>
                    </blockquote>

                </div>
                <div class="row" style="padding:10px;">
                    <blockquote class="blockquote">
                    @if($curso->startSubscription < date("m.d.y") && $curso->endSubscription > date("m.d.y"))
                        Situação: Inscrições abertas até {{$curso->endSubscription}}
                    @elseif($curso->startSubscription > date("m.d.y"))
                        Situação: Incrições abrem a partir de {{$curso->startSubscription}}
                    @else
                        Situação: Inscrições encerradas em {{$curso->endSubscription}}
                    @endif
                    <br/>
                    Vagas: {{$curso->vacancies}}
                    <br/>
                    Inscritos: {{ $numInscritos }}
                    <br/>
                    </blockquote>
                </div>
                <div class="row" style="margin-top: -20px; padding-right: 10px; padding-left: 10px;">
                    <div class="col" >
                        <h6>Últimos Incritos:</h6>
                        <div class="alert alert-danger" role="alert">
                            EM PRODUÇÃO
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <img src="https://www.whistler.com/images/placeholders/200x200.gif" alt="Imagem Padrão"
                     class="rounded mx-auto d-block" height="200" width="200">
                <br/>
                <blockquote class="blockquote">
                Ínicio: {{$curso->startCourse}}
                <br/>
                Fim: {{$curso->endCourse}}
                </blockquote>

                <h5>Agenda:</h5>

                <table class="table table-striped">
                    <tbody>
                        @foreach($agenda as $a)
                            <tr>
                                <td>{{$a->dayWeek}}</td>
                                <td>{{$a->startTime}}</td>
                                <td>{{$a->endTime}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <blockquote class="blockquote">
                CH Total: {{$curso->workload}}
                </blockquote>
            </div>
        </div>
        <div class="row" style="padding-bottom:15px;">
            <div class="col-xl-6 col-lg-6 col-md-6 .col-sm-12 align-self-start text-center">
                Ações:
                <br />
                    <i class="far fa-edit fa-2x px-md-2"></i>
                    <a href="javascript:confirmaDelete( {{$curso->id}}, '{{$curso->name}}' )" ><i class="fas fa-trash-alt fa-2x px-md-2"></i></a>
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