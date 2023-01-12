


@include('layout.header')
<link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">

<div class="container d-flex flex-column align-items-center justify-content-center" style="">
    <div class="login_box d-flex flex-row justify-content-between">

        <div class="col">
            <div class="login_img">
                <img src="{{ asset('assets/images/login.png') }}" alt="" width="450">
            </div>
        </div>
        <div class="col">
            <div class="login">
                <h1 class="text-center">Login</h1>

                <div class="formulario">
                    <form action="">
                        <div class="row g-2 mb-2">
                            <div class="col-12">
                                <label class="label-form" for="usuario">Usuário</label>
                                <input type="text" id="usuario" name="usuario" class="form-control">
                            </div>
                            <div class="col-12">
                                <label class="label-form" for="senha">Senha</label>
                                <input type="password" id="senha" name="senha" class="form-control" >
                            </div>
                            <div class="col-12">
                               <div class="d-flex justify-content-end">
                                    <a href="" class="text-decoration-none" style="color:#3173b1">Esqueci minha senha</a>
                               </div>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-12 d-flex justify-content-center">
                                <a href="{{route('dashboard.home')}}" class="btn btn-block btn-primary"><i class="fa-solid fa-right-to-bracket me-2"></i>Entrar</a>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="mt-3">
                    <p class="text-center">Não tem uma conta? Solicite ao gestor.</p>
                </div>

                <div class="d-flex justify-content-center align-items-end" style="height: 100px; color: #b9b9b9">
                    <p>nobretech&copy;2023</p>
                </div>

            </div>
        </div>



    </div>
</div>
</div>

@include('layout.rodape')
