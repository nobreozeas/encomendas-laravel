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
        <div class="row">
            <div class="col d-flex flex-row fase_form">
                <div id="circle1" class="circle active"><i id="ip1" class="fa-solid fa-user"></i></div>
                <div id="p1" class="ps"></div>

                <div id="circle2" class="circle"><i id="ip2" class="fa-solid fa-paper-plane "></i></div>
                <div id="p2" class="ps"></div>

                <div id="circle3" class="circle"><i id="ip3" class="fa-solid fa-box-open"></i></div>
                <div id="p3" class="ps"></div>

                <div id="circle4" class="circle"><i id="ip4" class="fa-solid fa-truck"></i></div>
            </div>
        </div>
        <div class="col mt-3">
            <form class="row g-3">
                <div id="input_cliente" class="box_form">

                    <div class="col-12 mb-3">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                            data-bs-target="#exampleModal"><i class="fa-regular fa-magnifying-glass me-2"></i>Pesquisar
                            Cliente</button>
                    </div>

                    <!--  modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pesquisar Cliente</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-12 mt-2 mb-3">
                                        <select id="cliente" name="cliente" class="form-select select-2">
                                            <option value="" selected>Selecione...</option>
                                            @foreach ($clientes as $cliente)
                                                <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="btn_busca_cliente"
                                        data-bs-dismiss="modal">Aplicar</button>

                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- fim  modal -->


                    <div id="formulario_avulso">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" class="form-control" name="nome_remetente" id="nome">
                            </div>
                            <div class="col-md-3">
                                <label for="tp_doc" class="form-label">Tipo de documento</label>
                                <select id="tp_doc" class="form-select" name="tp_doc_remetente">
                                    <option value="" selected>Selecione...</option>
                                    <option value="CPF">CPF</option>
                                    <option value="CNPJ">CNPJ</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="documento" class="form-label">Documento</label>
                                <input type="text" class="form-control" id="documento" name="documento_remetente">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email_remetente">
                            </div>
                            <div class="col-md-6">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input type="text" class="form-control" id="telefone" name="telefone_remetente">
                            </div>

                        </div>
                    </div>
                    <div class="row mt-2 origem">
                        <div class="col-12 ">
                            <label for="origem" class="form-label">Origem</label>
                            <select id="origem" class="form-select" name="origem">
                                <option value="" selected>Selecione...</option>
                                <option value="placido">Placido</option>
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col_btns col-12 d-flex justify-content-end mt-2">
                            <button type="button" class="btn btn-primary" id="btn_p1">Próximo<i
                                    class="fa-solid fa-angle-right ms-2"></i></button>
                        </div>
                    </div>

                </div>

                <div id="input_destinatario" class="box_form">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                data-bs-target="#exampleModal2"><i
                                    class="fa-regular fa-magnifying-glass me-2"></i>Pesquisar
                                Cliente</button>
                        </div>
                    </div>
                    <div class="row g-3">

                        <div class="col-md-6">
                            <label for="nome_destinatario" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome_destinatario" name="nome_destinatario">
                        </div>
                        <div class="col-md-3">
                            <label for="tp_doc_destinatario" class="form-label">Tipo de documento</label>
                            <select id="tp_doc_destinatario" class="form-select">
                                <option value="" selected>Selecione...</option>
                                <option value="CPF">CPF</option>
                                <option value="CNPJ">CNPJ</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="documento_destinatario" class="form-label">Documento</label>
                            <input type="text" class="form-control" id="documento_destinatario">
                        </div>

                        <div class="col-md-6">
                            <label for="telefone_destinatario" class="form-label">Telefone</label>
                            <input type="text" class="form-control" id="telefone_destinatario">
                        </div>

                        <div class="col-md-6 ">
                            <label for="destino" class="form-label">Destino</label>
                            <select id="destino" class="form-select" required>
                                <option value="" selected>Selecione...</option>
                                <option value="rio branco">Rio Branco</option>
                            </select>
                        </div>
                        <div class="col_btns col-12 d-flex justify-content-end mt-2">
                            <button type="button" class="btn btn-secondary me-2" id="btn_v2"><i
                                    class="fa-solid fa-angle-left me-2"></i>Anterior</button>
                            <button type="button" class="btn btn-primary" id="btn_p2">Próximo<i
                                    class="fa-solid fa-angle-right ms-2"></i></button>
                        </div>

                    </div>
                </div>


                <!--  modal -->
                <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Pesquisar Cliente</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-12 mt-2 mb-3">
                                    <select id="cliente2" name="cliente" class="form-select select-2">
                                        <option value="" selected>Selecione...</option>
                                        @foreach ($clientes as $cliente)
                                            <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="btn_busca_cliente"
                                    data-bs-dismiss="modal">Aplicar</button>

                            </div>
                        </div>
                    </div>
                </div>


                <!-- fim  modal -->


                <div id="input_encomenda" class="box_form">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="descricao_encomenda" class="form-label">Descrição</label>
                            <input type="text" class="form-control" id="descricao_encomenda">
                        </div>

                        <div class="col-md-6">
                            <label for="unidade" class="form-label">Unidade</label>
                            <select id="unidade" class="form-select">
                                <option value="" selected>Selecione...</option>
                                <option value="1">Unidade</option>
                                <option value="2">Kg</option>
                                <option value="3">Metros</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="quantidade" class="form-label">Quantidade</label>
                            <input type="number" class="form-control" id="quantidade">
                        </div>
                        <div class="col-md-12">
                            <label for="observacao" class="form-label">Observação</label>
                            <textarea class="form-control" id="observacao" rows="3"></textarea>
                        </div>
                        <div class="col_btns col-12 d-flex justify-content-end mt-2">
                            <button type="button" class="btn btn-secondary me-2" id="btn_v3"><i
                                    class="fa-solid fa-angle-left me-2"></i>Anterior</button>
                            <button type="button" class="btn btn-primary" id="btn_p3">Próximo<i
                                    class="fa-solid fa-angle-right ms-2"></i></button>
                        </div>
                    </div>
                </div>

                <div id="input_frete" class="box_form">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="forma_pagamento" class="form-label">Forma de Pagamento</label>
                            <select id="forma_pagamento" class="form-select">
                                <option value="" selected>Selecione...</option>
                                <option value="1">Dinheiro</option>
                                <option value="2">Cartão de Crédito</option>
                                <option value="3">Cartão de Débito</option>
                                <option value="4">Transferência</option>
                                <option value="5">Pix</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="valor_pago" class="form-label">Valor Pago</label>
                            <input type="text" class="form-control" id="valor_pago">
                        </div>
                        <div class="col-md-4">
                            <label for="tp_faturamento" class="form-label">Faturamento</label>
                            <select id="tp_faturamento" class="form-select">
                                <option value="" selected>Selecione...</option>
                                <option value="1">À Vista</option>
                                <option value="2">À Prazo</option>
                            </select>

                        <div class="col_btns col-12 d-flex justify-content-end align-items-end mt-2">
                            <button type="button" class="btn btn-secondary me-2" id="btn_v4"><i
                                    class="fa-solid fa-angle-left me-2"></i>Anterior</button>
                            <button type="submit" class="btn btn-primary" id="btn_add_encomenda"><i
                                    class="fa-solid fa-floppy-disk me-2"></i>Finalizar</button>
                        </div>

                    </div>


                </div>


            </form>
        </div>
    </div>

    <script>

        $(document).ready(function() {

            $('#cliente').on('change', function() {

                if ($('#cliente').val() != '') {
                    var cliente = $('#cliente').val();
                    $.ajax({
                        url: "{{ route('buscar_cliente') }}",
                        type: 'POST',
                        data: {
                            cliente: cliente
                        },
                        success: function(data) {
                            console.log(data);

                            $('#nome').val(data.cliente.nome);
                            $('#telefone').val(data.cliente.telefone).mask(SPMaskBehavior,
                                spOptions);
                            $('#email').val(data.cliente.email);
                            $('#tp_doc').val(data.cliente.tp_documento).change();
                            $('#documento').val(data.cliente.documento).mask(cpfCnpj, cpfOptions) ;



                        }
                    });
                }
            });

            $('#cliente2').on('change', function() {

                if ($('#cliente2').val() != '') {
                    var cliente = $('#cliente').val();
                    $.ajax({
                        url: "{{ route('buscar_cliente') }}",
                        type: 'POST',
                        data: {
                            cliente: cliente
                        },
                        success: function(data) {
                            console.log(data);

                            $('#nome_destinatario').val(data.cliente.nome);
                            $('#telefone_destinatario').val(data.cliente.telefone).mask(
                                SPMaskBehavior,
                                spOptions);
                            $('#tp_doc_destinatario').val(data.cliente.tp_documento).change();
                            $('#documento_destinatario').val(data.cliente.documento).mask(cpfCnpj, cpfOptions);



                        }
                    });
                }
            });


            //ocultando inputs
            $('#input_destinatario').hide();
            $('#input_encomenda').hide();
            $('#input_frete').hide();
            //passo 1 - configurando botoes de proximo
            $('#btn_p1').click(function() {
                $('#p1').css('background-color', '#4e73df')
                $('#circle2').addClass('active');
                $('#input_cliente').hide();
                $('#input_destinatario').show();

            });
            $('#btn_p2').click(function() {
                $('#p2').css('background-color', '#4e73df')
                $('#circle3').addClass('active');
                $('#input_destinatario').hide();
                $('#input_encomenda').show();
            });
            $('#btn_p3').click(function() {
                $('#p3').css('background-color', '#4e73df')
                $('#circle4').addClass('active');
                $('#input_encomenda').hide();
                $('#input_frete').show();
            });

            //passo 2 - configurando botoes de voltar
            $('#btn_v2').click(function() {
                $('#p1').css('background-color', '#808080')
                $('#circle2').removeClass('active');
                $('#input_destinatario').hide();
                $('#input_cliente').show();
            });
            $('#btn_v3').click(function() {
                $('#p2').css('background-color', '#808080')
                $('#circle3').removeClass('active');
                $('#input_encomenda').hide();
                $('#input_destinatario').show();
            });
            $('#btn_v4').click(function() {
                $('#p3').css('background-color', '#808080')
                $('#circle4').removeClass('active');
                $('#input_frete').hide();
                $('#input_encomenda').show();
            });

            $('body').on('change', '#origem, #nome, #tp_doc, #documento, #telefone', function() {

                if ($('#nome').val() != '' && $('#tp_doc').val() != '' && $('#documento')
                    .val() != '' && $('#telefone').val() != '' && $('#origem').val() != ''
                ) {
                    $('#btn_p1').prop('disabled', false);


                } else {
                    $('#btn_p1').prop('disabled', true);
                }
            });

            $('#btn_add_encomenda').show()
            $('.origem').show();
            $('#btn_p1').show();
            $('#btn_p1').prop('disabled', true);
            $('#cliente').val('').change();
            $('#origem').val('').change();



            var SPMaskBehavior = function(val) {
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },
                spOptions = {
                    onKeyPress: function(val, e, field, options) {
                        field.mask(SPMaskBehavior.apply({}, arguments), options);
                    }
                };
            $('#telefone, #telefone_destinatario').mask(SPMaskBehavior, spOptions);
            $('#valor_pago').mask(
                '#.##0,00', {
                    reverse: true
                });
            $('.select-2, #origem, #destino, #unidade, #forma_pagamento, #tp_faturamento').select2({
                language: "pt-BR",
                theme: "bootstrap-5"
            });

            $('#tp_doc').on('change', function() {
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

            $('#tp_doc_destinatario').on('change', function() {
                if (this.value == 'CPF') {
                    $('#documento_destinatario').mask('000.000.000-00', {
                        reverse: true
                    });
                } else if (this.value == 'CNPJ') {
                    $('#documento_destinatario').mask('00.000.000/0000-00', {
                        reverse: true
                    });
                }
            });

            //passo 3 - validando inputs de destinatario
            $('#btn_p2').prop('disabled', true);
            $('body').on('change',
                '#nome_destinatario, #tp_doc_destinatario, #documento_destinatario, #telefone_destinatario, #destino',
                function() {
                    if ($('#nome_destinatario').val() != '' && $('#tp_doc_destinatario').val() != '' && $(
                            '#documento_destinatario').val() != '' && $('#telefone_destinatario').val() != '' &&
                        $(
                            '#destino').val() != '') {
                        $('#btn_p2').prop('disabled', false);
                    } else {
                        $('#btn_p2').prop('disabled', true);
                    }
                });

            //passo 4 - validando inputs de encomenda
            $('#btn_p3').prop('disabled', true);
            $('body').on('change', '#unidade, #descricao_encomenda, #quantidade',
                function() {
                    if ($('#unidade').val() != '' && $('#descricao_encomenda').val() != '' && $('#quantidade')
                        .val() !=
                        '') {
                        $('#btn_p3').prop('disabled', false);
                    } else {
                        $('#btn_p3').prop('disabled', true);
                    }
                });

            //passo 5 - validando inputs de pagamento
            $('#btn_add_encomenda').prop('disabled', true);
            $('body').on('change', '#forma_pagamento, #valor_pago, #tp_faturamento',
                function() {
                    if ($('#forma_pagamento').val() != '' && $('#valor_pago').val() != '' && $('#tp_faturamento') != '') {
                        $('#btn_add_encomenda').prop('disabled', false);
                    } else {
                        $('#btn_add_encomenda').prop('disabled', true);
                    }
                });

                var cpfCnpj = function(val) {
                    return val.replace(/\D/g, '').length === 11 ? '000.000.000-00' : '00.000.000/0000-00';
                },
                cpfOptions = {
                    onKeyPress: function(val, e, field, options) {
                        field.mask(cpfCnpj.apply({}, arguments), options);
                    }
                };







        });
    </script>

@endsection
