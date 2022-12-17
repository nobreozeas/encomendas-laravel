{{-- <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="#">Sign out</a>
      </div>
    </div>
</header> --}}

<header class="navbar sticky-top flex-md-nowrap p-0  nav_top">

    <a href="" class="navbar-brand col-md-3 col-lg-2 me-0 px-3">
        <img src="{{ asset('assets/images/logo.png') }}" alt="" width="50"> EXPRESS<sub>2.0</sub>
    </a>

    <div class="pe-3" id="botao_logout">
        <div class="dropdown">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3 dropdown-toggle text-light"  href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 16px;">
                    Olá, Ozeas <i class="fa fa-ellipsis-vertical ms-2" aria-hidden="true"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="margin-left: -76px;">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>


        </div>
    </div>

    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span><i class="fa-solid fa-bars"></i></span>
    </button>



    {{-- <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-decoration-none text-light"><i
                                class="fa-solid fa-house"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-decoration-none text-light">Imóveis à venda</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-decoration-none text-light">Imóveis para alugar</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-decoration-none text-light">Sobre nós</a>
                    </li>
                </ul>
            </div> --}}



</header>
