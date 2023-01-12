@extends('layout.app')
@section('title', 'Adicionar Agência')
@section('titulo_pagina', 'Adicionar Agência')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Adicionar Agência</h1>
    <a href="{{ url()->previous() }}" class="btn btn-secondary"><i
            class="fa-solid fa-arrow-left me-2"></i>Voltar</a>
</div>

<form action="" id="form_agencia" class="row g-3">
    @csrf

    <div class="col-md-4">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
    </div>
    <div class="col-md-4">
        <label for="municipio" class="form-label">Município</label>
        <select name="municipio" id="municipio" class="form-select">
            <option value="" selected>Selecione</option>
            @foreach ($municipios as $municipio)
                <option value="{{ $municipio->id }}">{{ $municipio->nome }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label for="telefone" class="form-label">Telefone</label>
        <input type="text" class="form-control" id="telefone" name="telefone" required>
    </div>
    <div class="col-md-3">
        <label for="cep" class="form-label">CEP</label>
        <input type="text" class="form-control" id="cep" name="cep">
    </div>
    <div class="col-md-3">
        <label for="endereco" class="form-label">Endereço</label>
        <input type="text" class="form-control" id="endereco" name="endereco" required>
    </div>
    <div class="col-md-3">
        <label for="numero" class="form-label">Número</label>
        <input type="text" class="form-control" id="numero" name="numero" required>
    </div>
    <div class="col-md-3">
        <label for="bairro" class="form-label">Bairro</label>
        <input type="text" class="form-control" id="bairro" name="bairro" required>
    </div>

    <div class="col-12 d-flex justify-content-end">
        <button type="submit" id="add_agencia" class="btn btn-primary"><i class="fa-solid fa-save me-2"></i>Salvar</button>
    </div>

</form>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('#municipio').select2({
            theme: 'bootstrap-5',
            language: 'pt-BR'
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

        $('#cep').blur(function () {
            var cep = $(this).val().replace(/\D/g, '');
            if (cep != "") {
                var validacep = /^[0-9]{8}$/;
                if (validacep.test(cep)) {
                    $('#endereco').val("...");
                    $('#bairro').val("...");

                    $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {
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


        $('#add_agencia').click(function (e) {
            e.preventDefault();
            var nome = $('#nome').val();
            var municipio = $('#municipio').val();
            var telefone = $('#telefone').val();
            var cep = $('#cep').val();
            var endereco = $('#endereco').val();
            var numero = $('#numero').val();
            var bairro = $('#bairro').val();
            $.ajax({
                url: "{{ route('agencias.salvar') }}",
                type: "POST",
                data: {
                    nome: nome,
                    municipio: municipio,
                    telefone: telefone,
                    cep: cep,
                    endereco: endereco,
                    numero: numero,
                    bairro: bairro
                },
                success: function (response) {
                    console.log(response);
                    if (response.code == 200) {
                        Swal.fire({
                            title: 'Sucesso!',
                            text: response.msg,
                            icon: 'success',
                            confirmButtonText: 'Ok',
                            confirmButtonColor: '#3085d6',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{ route('agencias.index') }}";
                            }else{
                                $('#form_agencia').trigger("reset");
                                $('#municipio').val('').trigger('change');
                            }
                        })
                    } else {
                        Swal.fire({
                            title: 'Erro!',
                            text: response.message,
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        })
                    }
                }
            });
        });
    });
</script>
@endpush
