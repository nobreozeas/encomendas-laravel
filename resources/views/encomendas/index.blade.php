
@extends('layout.app')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Encomendas</h1>
    <a href="{{route('encomendas.adicionar')}}" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>Adicionar</a>
</div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped text-center" id="table1">
                            <thead>
                                <tr>
                                    <th>CTRC</th>
                                    <th>Cliente</th>
                                    <th>Agência</th>
                                    <th>Estado</th>
                                    <th>Valor</th>
                                    <th>Data</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($encomendas as $encomenda)

                                    <tr>
                                        <td>{{ $encomenda['id'] }}</td>
                                        <td>{{ $encomenda['cliente'] }}</td>
                                        <td>{{ $encomenda['agencia'] }}</td>
                                        <td>{{ $encomenda['estado'] }}</td>
                                        <td>{{ $encomenda['valor'] }}</td>
                                        <td>{{ $encomenda['data'] }}</td>
                                        <td>
                                            <a href="#"
                                                class="btn btn-primary btn-sm">Ver</a>
                                            <a href="#"
                                                class="btn btn-warning btn-sm">Editar</a>
                                            <form action="#" method="POST"
                                                style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Apagar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
