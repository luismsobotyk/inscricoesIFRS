@extends('layouts.app')

@section('content')

    <div class="container">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="/cadastrarCurso" method="post">
                    <input type="hidden" name="_token" value="{{{ csrf_token()  }}}" />
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Nome Curso</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Nome do Curso" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="vacancies">Vagas</label>
                            <input type="number" class="form-control" name="vacancies" id="vacancies" placeholder="nn" value="{{ old('vacancies') }}" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="startCourse">Data de Ínicio do Curso</label>
                            <input type="date" class="form-control" name="startCourse" id="startCourse" value="{{ old('startCourse') }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="endCourse">Data Final do Curso</label>
                            <input type="date" class="form-control" name="endCourse" id="endCourse" value="{{ old('endCourse') }}" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="startSubscription">Ínicio das incrições</label>
                            <input type="date" class="form-control" name="startSubscription" id="startSubscription" value="{{ old('startSubscription') }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="endSubscription">Fim das incrições</label>
                            <input type="date" class="form-control" name="endSubscription" id="endSubscription" value="{{ old('endSubscription') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Descrição</label>
                        <textarea class="form-control" id="description" name="description"
                                  placeholder="Breve Descrição" required> {{ old('description') }} </textarea>
                    </div>

                    <div class="form-row justify-content-end">
                        <div class="col-md-4">
                            <label for="workload">Carga Horária Total do Curso</label>
                            <input type="number" class="form-control" name="workload" id="workload" placeholder="nn" value="{{ old('workload') }}" required>
                        </div>
                    </div>

                    <label>Agenda de Horários</label>

                    <div class="border" style="padding: 10px;">

                        <div class="form-row justify-content-center border-bottom" style="padding-bottom:5px;">
                            <div class="col-md-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="domingo" value="domingo" @if(is_array(old('dayWeek')) && in_array('domingo', old('dayWeek'))) checked @endif name="dayWeek[]">
                                    <label class="custom-control-label" for="domingo">Domingo</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="inicioDomingo">Inicio</label>
                                <input type="time" class="form-control" name="inicioDomingo" id="inicioDomingo" value="{{ old('inicioDomingo') }}">
                            </div>
                            <div class="col-md-2">
                                <label for="fimDomingo">Fim</label>
                                <input type="time" class="form-control" name="fimDomingo" id="fimDomingo" value="{{ old('fimDomingo') }}">
                            </div>
                        </div>

                        <div class="form-row justify-content-center border-bottom" style="padding-bottom:5px; padding-top:5px;">
                            <div class="col-md-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="segunda-feira"
                                           value="segunda-feira" name="dayWeek[]" @if(is_array(old('dayWeek')) && in_array('segunda-feira', old('dayWeek'))) checked @endif>
                                    <label class="custom-control-label" for="segunda-feira">Segunda-Feira</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="inicioSegunda">Inicio</label>
                                <input type="time" class="form-control" name="inicioSegunda" id="inicioSegunda" value="{{ old('inicioSegunda') }}">
                            </div>
                            <div class="col-md-2">
                                <label for="fimSegunda">Fim</label>
                                <input type="time" class="form-control" name="fimSegunda" id="fimSegunda" value="{{ old('fimSegunda') }}">
                            </div>
                        </div>


                        <div class="form-row justify-content-center border-bottom" style="padding-bottom:5px; padding-top:5px;">
                            <div class="col-md-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="terca-feira"
                                           value="terca-feira" name="dayWeek[]" @if(is_array(old('dayWeek')) && in_array('terca-feira', old('dayWeek'))) checked @endif>
                                    <label class="custom-control-label" for="terca-feira">Terça-Feira</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="inicioTerça">Inicio</label>
                                <input type="time" class="form-control" name="inicioTerca" id="inicioTerca" value="{{ old('inicioTerca') }}">
                            </div>
                            <div class="col-md-2">
                                <label for="fimTerca">Fim</label>
                                <input type="time" class="form-control" name="fimTerca" id="fimTerca" value="{{ old('fimTerca') }}">
                            </div>
                        </div>


                        <div class="form-row justify-content-center border-bottom" style="padding-bottom:5px; padding-top:5px;">
                            <div class="col-md-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="quarta-feira"
                                           value="quarta-feira" name="dayWeek[]" @if(is_array(old('dayWeek')) && in_array('quarta-feira', old('dayWeek'))) checked @endif>
                                    <label class="custom-control-label" for="quarta-feira">Quarta-Feira</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="inicioquarta">Inicio</label>
                                <input type="time" class="form-control" name="inicioQuarta" id="inicioQuarta" value="{{ old('inicioQuarta') }}">
                            </div>
                            <div class="col-md-2">
                                <label for="fimquarta">Fim</label>
                                <input type="time" class="form-control" name="fimQuarta" id="fimQuarta" value="{{ old('fimQuarta') }}">
                            </div>
                        </div>

                        <div class="form-row justify-content-center border-bottom" style="padding-bottom:5px; padding-top:5px;">
                            <div class="col-md-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="quinta-feira"
                                           value="quinta-feira" name="dayWeek[]" @if(is_array(old('dayWeek')) && in_array('quinta-feira', old('dayWeek'))) checked @endif>
                                    <label class="custom-control-label" for="quinta-feira">Quinta-Feira</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="inicioquinta">Inicio</label>
                                <input type="time" class="form-control" name="inicioQuinta" id="inicioQuinta" value="{{ old('inicioQuinta') }}">
                            </div>
                            <div class="col-md-2">
                                <label for="fimquinta">Fim</label>
                                <input type="time" class="form-control" name="fimQuinta" id="fimQuinta" value="{{ old('fimQuinta') }}">
                            </div>
                        </div>

                        <div class="form-row justify-content-center border-bottom" style="padding-bottom:5px; padding-top:5px;">
                            <div class="col-md-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="sexta-feira"
                                           value="sexta-feira" name="dayWeek[]" @if(is_array(old('dayWeek')) && in_array('sexta-feira', old('dayWeek'))) checked @endif>
                                    <label class="custom-control-label" for="sexta-feira">Sexta-Feira</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="iniciosexta">Inicio</label>
                                <input type="time" class="form-control" name="inicioSexta" id="inicioSexta" value="{{ old('inicioSexta') }}">
                            </div>
                            <div class="col-md-2">
                                <label for="fimsexta">Fim</label>
                                <input type="time" class="form-control" name="fimSexta" id="fimSexta" value="{{ old('fimSexta') }}">
                            </div>
                        </div>

                        <div class="form-row justify-content-center" style="padding-top:5px;">
                            <div class="col-md-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="sabado"
                                           value="sabado" name="dayWeek[]" @if(is_array(old('dayWeek')) && in_array('sabado', old('dayWeek'))) checked @endif>
                                    <label class="custom-control-label" for="sabado">Sábado</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="iniciosabado">Inicio</label>
                                <input type="time" class="form-control" name="inicioSabado" id="inicioSabado" value="{{ old('inicioSabado') }}">
                            </div>
                            <div class="col-md-2">
                                <label for="fimsabado">Fim</label>
                                <input type="time" class="form-control" name="fimSabado" id="fimSabado" value="{{ old('fimSabado') }}">
                            </div>
                        </div>
                    </div>
                    <br />
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
