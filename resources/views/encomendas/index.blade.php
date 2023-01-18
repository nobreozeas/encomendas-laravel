@extends('layout.app')

@push('styles')
@endpush
<link rel="stylesheet" href="{{ asset('assets/css/encomendas.css') }}">


@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Encomendas</h1>
        <a href="{{ route('encomendas.adicionar') }}" class="btn btn-primary"><i
                class="fa-solid fa-plus me-2"></i>Adicionar</a>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="busca" id="busca"
                    placeholder="número, código de rastreio, descrição" aria-label="Recipient's username"
                    aria-describedby="basic-addon2">
                <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-magnifying-glass"></i></span>
            </div>

        </div>
        <div class="col-md-3">
            <select name="status" id="status" class="form-select">
                <option value="">Situação</option>
                <option value="1">Aberto</option>
                <option value="2">Em trânsito</option>
                <option value="3">Aguardando Retirada</option>
                <option value="4">Concluído</option>
                <option value="5">Cancelado</option>
            </select>
        </div>
        <div class="col-md-3">
            <select name="agencia" id="agencia" class="form-select">
                <option value="">Agência</option>
                @foreach ($agencias as $agencia)
                    <option value="{{ $agencia->id }}">{{ $agencia->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <button class="btn" id="limpa_filtro"><i class="fa-regular fa-filter me-2"></i>Limpar</button>
        </div>
    </div>
    <div>
        <table id="tabela_encomenda" class="table table-responsive table-striped">
            <thead>
                <tr>
                    <th class="">#</th>
                    <th class="text-center">Descrição</th>
                    <th class="text-center">Valor</th>
                    <th class="text-center">Origem</th>
                    <th class="text-center">Destino</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody></tbody>


        </table>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            var tabela = $('#tabela_encomenda').DataTable({
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
                    url: "{{ route('encomendas.listar') }}",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: function(data) {
                        data.busca = $('#busca').val();
                        data.agencia = $('#agencia').val();
                        data.status = $('#status').val();
                    }
                },
                "columns": [{
                        data: null,
                        "width": "10px",
                        className: 'align-middle',
                        render: function(data) {

                            return data.id;
                        }
                    }, {
                        data: null,
                        "width": "300",
                        className: 'align-middle',
                        render: function(data) {
                            return data.descricao;
                        }
                    }, {
                        data: null,
                        "width": "70px",
                        className: 'text-center align-middle',
                        render: function(data) {
                            let dinheiro = parseFloat(data.valor);
                            dinheiro = dinheiro.toLocaleString('pt-br', {
                                minimumFractionDigits: 2
                            });
                            return dinheiro;
                        }
                    }, {
                        data: null,
                        "width": "70px",
                        className: 'text-center align-middle',
                        render: function(data) {

                            return data.has_origem.nome;
                        }
                    }, {
                        data: null,
                        "width": "70px",
                        className: 'text-center align-middle',
                        render: function(data) {
                            return data.has_destino.nome;
                        }
                    },
                    {
                        data: null,
                        "width": "100px",

                        className: 'text-center align-middle',
                        render: function(data) {
                            let status = '';
                            let cor = '';

                            let status_array = {
                                1: 'Aberto',
                                2: 'Em trânsito',
                                3: 'Aguardando Retirada',
                                4: 'Concluído',
                                5: 'Cancelado'
                            };

                            if (data.status == 5) {
                                status +=
                                    `<select style="border: 1px solid #BB2D3B;" class="form-select status" data-status="${data.id}" disabled>`;
                            } else if (data.status == 4) {
                                status +=
                                    `<select style="border: 1px solid #2ECC71;" class="form-select status" data-status="${data.id}" disabled>`;
                            } else {
                                status +=
                                    `<select class="form-select status" data-status="${data.id}">`;
                            }

                            for (let i = 1; i <= 5; i++) {
                                if (i == data.status) {
                                    status +=
                                        `<option class="opt_status" value="${i}" selected>${status_array[i]}</option>`;
                                } else {
                                    status +=
                                        `<option class="opt_status" value="${i}">${status_array[i]}</option>`;
                                }
                            }
                            status += `</select>`;
                            return status;
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

            $('#agencia').change(function() {
                tabela.draw();
            });

            $('#status').change(function() {
                tabela.draw();
            });

            $('#limpa_filtro').on('click', function() {
                $('#busca').val('');
                $('#agencia').val('');
                $('#status').val('');
                tabela.draw();
            })

            $('body').on('change', '.status', function() {
                let status = $(this).val();
                let id = $(this).data('status');
                console.log(status, id);

                if (status == 5) {
                    Swal.fire({
                        title: 'Tem certeza?',
                        text: "Você não poderá reverter isso!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: 'gray',
                        cancelButtonText: 'Fechar',
                        confirmButtonText: 'Sim, cancelar!'
                    }).then(async (result) => {
                        if (result.isConfirmed) {
                            const {
                                value: motivoCancelamento
                            } = await Swal.fire({
                                title: 'Motivo do cancelamento',
                                input: 'text',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonText: 'Cancelar',
                                inputValidator: (value) => {
                                    if (!value) {
                                        return 'Você precisa escrever o motivo do cancelamento!'
                                    }
                                }
                            })
                            if (motivoCancelamento) {
                                atualizaStatus(id, status, motivoCancelamento);
                            }
                        }else{
                            tabela.draw();
                        }
                    })

                } else {
                    atualizaStatus(id, status);
                }
            });

            function atualizaStatus(id, status, motivoCancelamento = null) {
                $.ajax({
                    url: "{{ route('encomendas.atualiza_status') }}",
                    type: "POST",
                    data: {
                        status: status,
                        id: id,
                        motivoCancelamento: motivoCancelamento
                    },
                    success: function(data) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal
                                    .resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'success',
                            title: data.message
                        })
                    },
                    error: function(error) {
                        console.log(error);
                    },
                    complete: function() {
                        tabela.draw();
                    }
                })
            }

        });
    </script>
@endpush
