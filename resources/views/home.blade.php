@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
            @endif

            <!-- First Row -->
                <div class="row">
                    <div class="col-sm">

                        <div class="card" style="width: 18rem;">

                            <a href="/aprovarDocumentos">
                                <div class="card-body" align="center">
                                    <i class="fas fa-clipboard-check fa-5x"></i>
                                    <br/>
                                    <br/>
                                    <h5 class="card-title">Aprovar Documentação</h5>
                                </div>
                            </a>
                        </div>

                    </div>

                    <div class="col-sm">

                        <div class="card" style="width: 18rem;">
                            <a href="/cursosAdm">
                                <div class="card-body" align="center">
                                    <i class="fas fa-book fa-5x"></i>
                                    <br/>
                                    <br/>
                                    <h5 class="card-title">Cursos</h5>
                                </div>
                            </a>
                        </div>


                    </div>

                    <div class="col-sm">

                        <div class="card" style="width: 18rem;">
                            <a href="/listaUsuarios">
                                <div class="card-body" align="center">
                                    <i class="fas fa-users fa-5x"></i>
                                    <br/>
                                    <br/>
                                    <h5 class="card-title">Usuários</h5>
                                </div>
                            </a>
                        </div>

                    </div>

                </div>
                <!-- Second Row -->
                <br/>
                <div class="row">
                    <div class="col-sm">

                        <div class="card" style="width: 18rem;">

                            <a href="/dashboards">
                                <div class="card-body" align="center">
                                    <i class="fas fa-chart-line fa-5x"></i>
                                    <br/>
                                    <br/>
                                    <h5 class="card-title">Dashboards</h5>
                                </div>
                            </a>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
