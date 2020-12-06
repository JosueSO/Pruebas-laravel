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
                        @guest
                            <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#modalLogin">
                                Inicio de sesión
                            </button>
                            |
                            <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#modalRegistro">
                                Registrarse
                            </button>
                        @else
                            <a class="btn btn-danger" data-toggle="collapse" data-target="#menu_user">
                                <i class="far fa-user"></i>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="collapse" id="menu_user">
                                <a class="btn btn-danger" href="/perfil">
                                    Mi perfil
                                </a>
                                <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        @endguest
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
                    <div>
                        <a href="/administrador" class="text-white">administrador</a>
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

        @guest
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
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </form>
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
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endguest
    </div>

    <script src="{{asset('js/app.js')}}"></script>
    @yield('scripts')
</body>
</html>