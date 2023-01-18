@extends('layout.app')
@section('title', 'Clientes')
@section('titulo_pagina', 'Clientes')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Adicionar Cliente</h1>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left me-2"></i>Voltar</a>
    </div>

    <div class="row">
        <div class="col">
            <div class="box_form">
                <form class="row g-3" action="" id="form_cliente">
                    <div class="col-md-4">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                    <div class="col-md-4">
                        <label for="tp_documento" class="form-label">Tipo de Documento</label>
                        <select name="tp_documento" class="form-select" id="tp_documento" required>
                            <option value="" selected>Selecione</option>
                            <option value="CPF">CPF</option>
                            <option value="CNPJ">CNPJ</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="documento" class="form-label">Documento</label>
                        <input type="text" class="form-control" id="documento" name="documento" required>
                        <div class="invalid-feedback">
                            Documento já cadastrado
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" required>
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <div class="invalid-feedback">
                            E-mail já cadastrado
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label for="cep" class="form-label">CEP</label>
                        <input type="text" class="form-control" id="cep" name="cep">

                    </div>

                    <div class="col-md-3">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" required>
                    </div>

                    <div class="col-md-1">
                        <label for="numero" class="form-label">Número</label>
                        <input type="text" class="form-control" id="numero" name="numero" required>
                    </div>

                    <div class="col-md-3">
                        <label for="bairro" class="form-label">Bairro</label>
                        <input type="text" class="form-control" id="bairro" name="bairro" required>

                    </div>
                    <div class="col-md-3">
                        <label for="municipio" class="form-label">Município</label>
                        <select name="municipio" class="form-select" id="municipio" required>
                            <option value="" selected>Selecione</option>
                            @foreach ($municipios as $municipio)
                                <option value="{{ $municipio->id }}">{{ $municipio->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary" id="btn_salvar"><i class="fa fa-save me-2" aria-hidden="true"></i>Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#municipio').select2({
                theme: 'bootstrap-5',
                language: 'pt-BR'
            });

            $('#tp_documento').on('change', function() {
                if (this.value == 'CPF') {
                    $('#documento').mask('000.000.000-00', {
                        reverse: true
                    });
                } else if (this.value == 'CNPJ') {
                    $('#documento').mask('00.000.000/0000-00', {
                        reverse: true
                    });
                }
            });


            var SPMaskBehavior = function(val) {
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },
                spOptions = {
                    onKeyPress: function(val, e, field, options) {
                        field.mask(SPMaskBehavior.apply({}, arguments), options);
                    }
                };
            $('#telefone').mask(SPMaskBehavior, spOptions);

            $('#cep').mask('00.000-000');

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#endereco").val("");
                $("#bairro").val("");
            }

            $('#cep').blur(function() {
                var cep = $(this).val().replace(/\D/g, '');
                if (cep != "") {
                    var validacep = /^[0-9]{8}$/;
                    if (validacep.test(cep)) {
                        $('#endereco').val("...");
                        $('#bairro').val("...");

                        $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {
                            if (!("erro" in dados)) {
                                $('#endereco').val(dados.logradouro);
                                $('#bairro').val(dados.bairro);
                            } else {
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } else {
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } else {
                    limpa_formulário_cep();
                }
            });

            $('#documento').on('blur', function() {
                var documento = $(this).val();
                if (documento != "") {
                    verificaCpf(documento);
                }
            });


            function verificaCpf(documento){

                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: '{{ route('clientes.verifica_cpf') }}',
                    data: {documento: documento},
                    success: function(data){


                        $('#btn_salvar').removeAttr('disabled');
                        $('#documento').removeClass('is-invalid');
                        $('#documento').addClass('is-valid');
                        setTimeout(() => {
                            $('#documento').removeClass('is-valid');
                        }, 2000);
                    },
                    error: function(erro){
                        Swal.fire({
                            title: 'Erro!',
                            text: erro.responseJSON.msg,
                            icon: 'error',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#0B5ED7',
                        });

                        $('#documento').addClass('is-invalid');
                        $('#btn_salvar').attr('disabled', 'disabled');


                    }
                })

            }

            $('#form_cliente').on('submit', function(e){
                e.preventDefault();

                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: '{{ route('clientes.salvar') }}',
                    data: $(this).serialize(),
                    success: function(data){
                        Swal.fire({
                            title: 'Sucesso!',
                            text: data.msg,
                            icon: 'success',
                            confirmButtonText: 'OK'
                            confirmButtonColor: '#0B5ED7',
                        }).then((result) => {

                            window.location.href = '{{ route('clientes.index') }}';

                        })
                    },
                    error: function(erro){
                        Swal.fire({
                            title: 'Erro!',
                            text: erro.responseJSON.msg,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                })
            })



        })
    </script>
@endpush
