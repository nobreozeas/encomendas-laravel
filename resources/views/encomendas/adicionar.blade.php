@extends('layout.app')
@section('title', 'Adicionar Encomenda')
@section('titulo_pagina', 'Adicionar Encomenda')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Adicionar Encomenda</h1>
        <a href="{{ route('encomendas.index') }}" class="btn btn-secondary"><i
            class="fa-solid fa-arrow-left me-2"></i>Voltar</a>
    </div>

    <div class="row">
        <div class="col">
            <form class="row g-3">
                <label for="" class="form-label">Tipo de Cliente</label>
                <div class="col-md-12 mt-0">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipo_cliente" id="cliente_cadastrado"
                            value="1">
                        <label class="form-check-label" for="cliente_cadastrado">Cliente Cadastrado</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipo_cliente" id="cliente_avulso"
                            value="2">
                        <label class="form-check-label" for="cliente_avulso">Cliente Avulso</label>
                    </div>
                </div>

                <div id="formulario_cliente">
                    <div class="col-md-12">
                        <label for="cliente" class="form-label">Cliente</label>
                        <select id="cliente" class="form-select">
                            <option selected>Selecione...</option>
                            <option>...</option>
                        </select>
                    </div>
                </div>

                <div id="formulario_avulso">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome">
                        </div>
                        <div class="col-md-6">
                            <label for="cpf" class="form-label">Documento</label>
                            <input type="text" class="form-control" id="cpf">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="col-md-6">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" class="form-control" id="telefone">
                        </div>

                    </div>
                </div>

                <div id="main_form">
                    <div class="col-md-12">
                        <label for="produto" class="form-label">Produto</label>
                        <select id="produto" class="form-select">
                            <option selected>Selecione...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="quantidade" class="form-label">Quantidade</label>
                        <input type="number" class="form-control" id="quantidade">
                    </div>
                    <div class="col-md-12">
                        <label for="valor" class="form-label">Valor</label>
                        <input type="number" class="form-control" id="valor">
                    </div>
                    <div class="col-md-12">
                        <label for="observacao" class="form-label">Observação</label>
                        <textarea class="form-control" id="observacao" rows="3"></textarea>
                    </div>
                </div>

                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary" id="btn_add_encomenda">Sign in</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#formulario_avulso').hide();
            $('#formulario_cliente').hide();
            $('#main_form').hide();
            $('#btn_add_encomenda').hide()
            $('input[type=radio][name=tipo_cliente]').change(function() {
                if (this.value == '1') {
                    $('#formulario_avulso').hide();
                    $('#formulario_cliente').show();
                    $('#main_form').show();
                    $('#btn_add_encomenda').show()
                } else if (this.value == '2') {
                    $('#formulario_cliente').hide();
                    $('#formulario_avulso').show();
                    $('#main_form').show();
                    $('#btn_add_encomenda').show()
                }
            });
        });
    </script>

@endsection
