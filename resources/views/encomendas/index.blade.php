
@extends('layout.app')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Encomendas</h1>
    <a href="{{route('encomendas.adicionar')}}" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>Adicionar</a>
</div>



@endsection
