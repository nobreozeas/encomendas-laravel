@extends('layout.app')
@section('title', 'Adicionar Usuário')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Adicionar Usuário</h1>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left me-2"></i>Voltar</a>
    </div>

    <div class="row">
        <div class="col">
            <div class="box_form">
                <form class="row g-3" action="" id="form_usuario">
                    @csrf
                    <div class="col-md-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                    <div class="col-md-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <div class="invalid-feedback">
                            E-mail já cadastrado
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" required>
                        <div class="invalid-feedback">
                            CPF já cadastrado
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" required>
                    </div>

                    <div class="col-md-4">
                        <label for="usuario" class="form-label">Usuário</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" required>
                        <div class="valid-feedback">
                            Usuário disponível
                        </div>
                        <div class="invalid-feedback">
                            Usuário indisponível
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" required>
                    </div>
                    <div class="col-md-4">
                        <label for="senha_confirmation" class="form-label">Confirmação de Senha</label>
                        <input type="password" class="form-control" id="senha_confirmation" name="senha_confirmation" required>
                        <div class="invalid-feedback">
                            Senhas não conferem
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="agencia" class="form-label">Agência</label>
                        <select class="form-select" id="agencia" name="agencia" required>
                            <option value="" selected>Selecione</option>
                            @foreach ($agencias as $agencia)
                                <option value="{{ $agencia->id }}">{{ $agencia->nome }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-md-4">
                        <label for="tipo" class="form-label">Tipo</label>
                        <select class="form-select" id="tipo" name="tipo" required>
                            <option value="" selected>Selecione</option>
                            @foreach ($permissoes as $permissao)
                                <option value="{{ $permissao->id }}" {{ $permissao->id == 1 ? 'disabled' : '' }}>
                                    {{ $permissao->descricao }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="ativo" class="form-label">Ativo</label>
                        <select class="form-select" id="ativo" name="ativo" required>
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>
                    <div class="col-md-12 d-flex justify-content-end">
                        <button type="submit" id="btn_add_usuario" class="btn btn-primary"><i class="fa-solid fa-save me-2"></i>Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            $('#form_usuario').on('submit', function(e){
                e.preventDefault();
                addUsuario();
            })

            //verifica se a senha e a confirmação de senha são iguais
            $('#senha_confirmation').on('keyup', function() {
                if ($('#senha').val() != $('#senha_confirmation').val()) {
                    $('#senha_confirmation').removeClass('is-valid');
                    $('#senha_confirmation').addClass('is-invalid');
                } else {
                    $('#senha_confirmation').removeClass('is-invalid');
                    $('#senha_confirmation').addClass('is-valid');
                    $('#senha').addClass('is-valid');
                    setTimeout(() => {
                        $('#senha_confirmation').removeClass('is-valid');
                        $('#senha').removeClass('is-valid');
                    }, 2000);
                }
            });

            //verifica se o usuário já existe
            $('body').on('blur','#usuario, #email, #cpf', function() {
                verificaUsuario($(this).val());
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

            $('#cpf').mask('000.000.000-00', { reverse: true });

            function verificaUsuario(dado){
                $.ajax({
                    url: "{{ route('usuarios.verifica_usuario') }}",
                    type: "POST",
                    data: {
                        dado: dado,
                    },
                    success: function(data) {

                        // setTimeout(() => {
                        //     $('#usuario').removeClass('is-valid');
                        // }, 2000);
                    },
                    error: function(error) {
                        usuario = error.responseJSON.usuario;

                        if($('#email').val() == usuario.email)
                        {
                            $('#email').addClass('is-invalid');
                        }
                        if($('#cpf').val() == usuario.cpf)
                        {
                            $('#cpf').addClass('is-invalid');
                        }
                        if($('#usuario').val() == usuario.usuario)
                        {
                            $('#usuario').addClass('is-invalid');
                        }
                    }
                });
            }

            function addUsuario(){
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: "{{route('usuarios.salvar')}}",
                    data:{
                        nome:$('#nome').val(),
                        email:$('#email').val(),
                        cpf:$('#cpf').val(),
                        usuario:$('#usuario').val(),
                        senha:$('#senha_confirmation').val(),
                        telefone:$('#telefone').val(),
                        tipo:$('#tipo').val(),
                        ativo:$('#ativo').val(),
                        agencia:$('#agencia').val(),
                    },
                    success:function(data){
                        Swal.fire({
                            title: 'Sucesso!',
                            text: 'Usuário cadastrado com sucesso!',
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{ route('usuarios.index') }}";
                            }
                        })
                    },
                    error: function(response){
                        Swal.fire({
                            title: 'Erro ao cadastrar usuário',
                            text: 'Usuario já cadastrado!',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        })
                    }
                })
            }




        });


    </script>
@endpush
