@extends('layout.app')
@section('title', 'Clientes')
@section('titulo_pagina', 'Clientes')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Clientes</h1>
        <a href="{{ route('usuarios.adicionar') }}" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>Adicionar</a>


    </div>

    <div class="col-md-4">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="busca" id="busca"
                placeholder="número, código de rastreio, descrição" aria-label="Recipient's username"
                aria-describedby="basic-addon2">
            <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-magnifying-glass"></i></span>
        </div>

    </div>

    <div>
        <table class="table table-striped table-hover" id="tabela_usuario">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Tipo Documento</th>
                    <th scope="col">Documento</th>
                    <th scope="col">Agência</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

@endsection

@push('scripts')
    <script>

    </script>
@endpush
