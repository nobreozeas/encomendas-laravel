@extends('layout.app')
@section('title', 'Clientes')
@section('titulo_pagina', 'Clientes')
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Clientes</h1>
        <a href="{{ route('clientes.adicionar') }}" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>Adicionar</a>


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
        <table class="table table-striped table-hover" id="tabela_cliente">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Tipo Documento</th>
                    <th scope="col">Documento</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Município</th>
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
        $(document).ready(function() {
            var tabela = $('#tabela_cliente').DataTable({
                "searching": false,
                "width": "100%",
                "order": [0, "DESC"],
                "processing": true,
                "serverSide": true,
                "bLengthChange": false,
                "responsive": true,
                "lenhtChange": false,
                "language": {
                    "url": "{{ asset('assets/js/pt-BR.json') }}"
                },
                "pageLength": 50,
                "ajax": {
                    url: "{{ route('clientes.listar') }}",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: function(data) {
                        data.busca = $('#busca').val();
                    }
                },
                "columns": [{
                        data: null,
                        "width": "10px",
                        className: 'align-middle',
                        render: function(data) {
                            console.log(data);
                            return data.id;
                        }
                    }, {
                        data: null,

                        className: 'text-center align-middle',
                        render: function(data) {
                            return data.nome;

                        }
                    }, {
                        data: null,
                        orderable: false,
                        className: 'text-center align-middle',
                        render: function(data) {
                            return data.telefone;



                        }
                    }, {
                        data: null,
                        orderable: false,
                        className: 'text-center align-middle',
                        render: function(data) {
                            return data.tp_documento;



                        }
                    },
                    {
                        data: null,
                        orderable: false,
                        className: 'text-center align-middle',
                        render: function(data) {
                            return data.documento;

                        }
                    },
                    {
                        data: null,
                        orderable: false,
                        className: 'text-center align-middle',
                        render: function(data) {


                            let endereco = data.endereco + ', ' + data.numero + ' - ' + data
                                .bairro + '.' + data.cep;

                            enderecoCompleto = `<div class="text-truncate" style="max-width:100px;">${endereco}</div>`;



                            return enderecoCompleto;
                        }
                    },
                    {
                        data: null,
                        className: 'text-center align-middle',
                        render: function(data) {

                            return data.municipio.nome + '/' + data.municipio.uf;
                        }
                    },

                    {
                        data: null,
                        orderable: false,
                        className: 'text-center align-middle',
                        render: function(data) {
                            let acoes = '';
                            let url_imprimir = "{{ route('encomendas.imprimir', '') }}" + "/" + data
                                .id;

                            acoes += `
                            <div class="dropdown d-flex justify-content-center">
                                <a class="dropdown-toggle btn_mais_acoes" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                                <ul class="dropdown-menu dropdown_menu_acoes">
                                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-eye me-2"></i>Visualizar</a></li>
                                    <li><a class="dropdown-item" href="${url_imprimir}" target="_blank"><i class="fa-solid fa-print me-2"></i>Imprimir</a></li>
                                </ul>
                            </div>`

                            return acoes;
                        }
                    }
                ]
            });
            $('#busca').keyup(function() {
                tabela.draw();
            });

            $('#limpa_filtro').on('click', function() {
                $('#busca').val('');
                $('#agencia').val('');
                $('#status').val('');
                tabela.draw();
            });

        });
    </script>
@endpush
