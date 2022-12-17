@include('layout.header')

@include('layout.menu')

<div class="container-fluid">
    <div class="row">

    @include('layout.sidebar')


      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">@yield('titulo_pagina')</h1>
        </div>

        @yield('content')


      </main>
    </div>
  </div>

@include('layout.rodape')
