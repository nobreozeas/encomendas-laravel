
@include('layout.header')

@include('layout.menu')

<div class="container-fluid">
    <div class="row">

        @include('layout.sidebar')


        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


            @yield('content')


        </main>
    </div>
</div>



@include('layout.rodape')
