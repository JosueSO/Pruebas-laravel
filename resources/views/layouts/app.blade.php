<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body class="bg-white">
    <div class="container-fluid">
        <div class="bg-danger row">
            <a class="col-6 py-3" href="/">
                <div class="d-inline-block" id="logo">
                    <img src="{{asset('img/popcorn_logo.png')}}" alt="Logo" class="img-fluid">
                </div>
                <div class="d-none d-md-inline-block text-white h1">
                    Popcorn
                </div>
            </a>
            <div class="d-none d-md-block col-6 p-2">
                <div class="d-flex justify-content-end">
                    <form class="d-inline-block form-inline">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div>
                            <input type="text" placeholder="Buscar" class="form-control">
                        </div>
                    </form>
                    <div class="ml-3 text-right d-inline-block">
                        <!-- <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#modalLogin">
                            Inicio de sesión
                        </button>
                        |
                        <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#modalRegistro">
                            Registrarse
                        </button> -->
                        <a class="btn btn-danger" href="/perfil">
                            <i class="far fa-user"></i>
                        </a>
                    </div>
                </div>
                <div class="mt-2">
                    <ul class="list-group list-group-horizontal text-center">
                        <li class="list-group-item list-group-item-action">Menu 1</li>
                        <li class="list-group-item list-group-item-action">Menu 2</li>
                        <li class="list-group-item list-group-item-action">Menu 3</li>
                    </ul>
                </div>
            </div>
            <div class="d-block d-md-none col-6 p-2 text-right">
                <button class="btn btn-danger" id="search_button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>

        <div id="page-content">
            @yield('content')
        </div>

        <div class="fixed-bottom">
            <div class="bg-danger row text-white d-none d-md-flex p-3">
                <div class="col-6" id="redes">
                    <a href="" class="text-white">
                        <i class="fab fa-facebook-square"></i>
                    </a>
                    <a href="" class="text-white">
                        <i class="fab fa-instagram-square"></i>
                    </a>
                    <a href="" class="text-white">
                        <i class="fab fa-twitter-square"></i>
                    </a>
                </div>
                <div class="col-6 text-right">
                    <a class="btn btn-danger" href="">Contáctanos</a>
                    <a class="btn btn-danger" href="/administrador">Panel Administrativo</a>
                </div>
            </div>
        </div>

        <div class="fixed-bottom">
            <div class="row justify-content-end collapse" id="menu_footer">
                <div class="col-4 bg-danger">
                    <div>
                        <a href="" class="text-white">Iniciar sesión</a>
                    </div>
                    <div>
                        <a href="" class="text-white">Registrarse</a>
                    </div>
                </div>
            </div>
            <div class="bg-danger row text-white d-md-none text-center">
                <div class="col-3">
                    <button class="btn btn-danger footer_phone">
                        <i class="fas fa-ticket-alt"></i>
                    </button>
                </div>
                <div class="col-3">
                    <button class="btn btn-danger footer_phone">
                        <i class="fas fa-tv"></i>
                    </button>
                </div>
                <div class="col-3">
                    <button class="btn btn-danger footer_phone">
                        <i class="fas fa-theater-masks"></i>
                    </button>
                </div>
                <div class="col-3">
                    <button class="btn btn-danger footer_phone" data-toggle="collapse" data-target="#menu_footer">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal de login -->
        <div class="modal fade" id="modalLogin" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Iniciar sesión</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="login_email">Correo</label>
                                <input type="text" id="login_email" name="login_email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="login_pass">Contraseña</label>
                                <input type="password" id="login_pass" name="login_pass" class="form-control">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">
                            Aceptar
                        </button>
                        <button class="btn btn-secondary" data-dismiss="modal">
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de registro -->
        <div class="modal fade" id="modalRegistro" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Registro</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="name">Nombre (s)</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="form-group col-6">
                                    <label for="lastname">Apellidos</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Correo</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="password">Contraseña</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div class="form-group col-6">
                                    <label for="password2">Confirmar contraseña</label>
                                    <input type="password2" class="form-control" id="lastname2" name="lastname2">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">
                            Aceptar
                        </button>
                        <button class="btn btn-secondary" data-dismiss="modal">
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('js/app.js')}}"></script>
    @yield('scripts')
</body>
</html>