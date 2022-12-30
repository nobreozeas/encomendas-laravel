
@extends('layout.app')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Encomendas</h1>
    <a href="{{route('encomendas.adicionar')}}" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>Adicionar</a>
</div>

<div class="row">
    <div class="col">
        <input type="text" name="busca" id="busca" class="form-control">
    </div>
</div>

<table id="tabela_encomenda" class="table table-responsive">
    <thead>
        <tr>
            <th>#</th>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Origem</th>
            <th>Destino</th>
        </tr>
    </thead>
    <tbody></tbody>

</table>

<script>
    $(document).ready(function(){

        var tabela = $('#tabela_encomenda').DataTable({
            "searching": false,
            "order": [ 0, "DESC"],
            "processing": true,
            "serverSide": true,
            "bLengthChange": false,
            "responsive": true,
            "lenhtChange": false,
            "language":{
                "url": "{{asset('assets/js/pt-BR.json')}}"
            },
            "pageLength": 10,

            "ajax": {
                url: "{{route('encomendas.listar')}}",
                type: "POST",
                headers:{
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data:function(data){
                    data.busca = $('#busca').val();
                }
            },
            "columns": [{
                data: null,
                render:function(data){
                    return data.id;
                }
            },{
                data: null,
                render:function(data){
                    return data.descricao;
                }
            },{
                data: null,
                render:function(data){
                    return data.valor;
                }
            },{
                data: null,
                render:function(data){
                    return data.id_origem;
                }
            },{
                data: null,
                render:function(data){
                    return data.id_destino;
                }
            }

        ]

        });



        $('#busca').keyup(function(){
            tabela.draw();
        });

    });
</script>



@endsection
