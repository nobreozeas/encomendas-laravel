<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column items_sidebar">
            <li class="nav-item">
                <a class="nav-link @if(Route::is('dashboard.home')) active  @endif" href="{{route('dashboard.home')}}">
                    <div class="row">
                        <div class="col-2">
                            <i class="fa-solid fa-gauge-high"></i>
                        </div>
                        <div class="col">
                            <span>Painel</span>
                        </div>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(Route::is('encomendas.index')) active @endif " href="{{route('encomendas.index')}}">
                    <div class="row">
                        <div class="col-2">
                            <i class="icons_dash fa-solid fa-box-open"></i>
                        </div>
                        <div class="col">
                            <span>Encomendas</span>
                        </div>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <div class="row">
                        <div class="col-2">
                            <i class="icons_dash fa-solid fa-circle-dollar"></i>
                        </div>
                        <div class="col">
                            <span>Caixa</span>
                        </div>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <div class="row">
                        <div class="col-2">
                            <i class="icons_dash fa-solid fa-clipboard-check"></i>
                        </div>
                        <div class="col">
                            <span>Manifesto</span>
                        </div>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <div class="row">
                        <div class="col-2">
                            <i class="fa-solid fa-handshake"></i>
                        </div>
                        <div class="col">
                            <span>Clientes</span>
                        </div>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <div class="row">
                        <div class="col-2">
                            <i class="fa-solid fa-bus"></i>
                        </div>
                        <div class="col">
                            <span>Agências</span>
                        </div>
                    </div>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <div class="row">
                        <div class="col-2">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div class="col">
                            <span>Usuários</span>
                        </div>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <div class="row">
                        <div class="col-2">
                            <i class="fa-solid fa-cog"></i>
                        </div>
                        <div class="col">
                            <span>Configurações</span>
                        </div>
                    </div>
                </a>
        </ul>
    </div>
</nav>
