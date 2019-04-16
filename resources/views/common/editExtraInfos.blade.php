@extends('layouts.app')

@section('content')

    <div class="container shadow-sm p-3 mb-5 bg-white rounded">
        <div class="row">
            <div class="col-md-11 border-bottom">
                <legend>Dados Pessoais</legend>
            </div>
        </div>
        <div style="margin-top: 10px;">
            <form>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nome:</label>
                    <div class="col-sm-4">
                        <input type="text" readonly class="form-control-plaintext" id="name" value="valor bd">
                    </div>
                    <label for="email" class="col-sm-2 col-form-label">E-mail:</label>
                    <div class="col-sm-4">
                        <input type="text" readonly class="form-control-plaintext" id="email" value="valor bd">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cpf" class="col-sm-2 col-form-label">CPF:</label>
                    <div class="col-sm-4">
                        <input type="text" readonly class="form-control-plaintext" id="cpf" value="valor bd">
                    </div>
                    <label for="rg" class="col-sm-2 col-form-label">RG:</label>
                    <div class="col-sm-4">
                        <div class="input-group mb-3">
                            <input type="text" readonly class="form-control-plaintext" id="rg" value="valor bd">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">SSP</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nome:</label>
                    <div class="col-sm-4">
                        <input type="text" readonly class="form-control-plaintext" id="name" value="valor bd">
                    </div>
                    <label for="email" class="col-sm-2 col-form-label">E-mail:</label>
                    <div class="col-sm-4">
                        <input type="text" readonly class="form-control-plaintext" id="email" value="valor bd">
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection