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
            <a class="col-6 py-3" href="/administrador">
                <div class="d-inline-block" id="logo">
                    <img src="{{asset('img/popcorn_logo.png')}}" alt="Logo" class="img-fluid">
                </div>
                <div class="d-none d-md-inline-block text-white h1">
                    Panel Administrativo
                </div>
            </a>
            <div class="col-6 p-2 d-flex justify-content-end align-items-center">
                <div class="btn btn-danger btn-lg">
                    <span class="d-none d-md-inline">UserName</span>
                    <i class="far fa-user"></i>
                </div>
            </div>
            @if (Request::url() != route('users.admin'))
            <nav class="navbar navbar-expand-md navbar-dark bg-danger">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="menu">
                    <div class="navbar-nav">
                        <a class="nav-link" href="/users">Usuarios</a>
                        <a class="nav-link" href="/categorias">Categorías</a>
                        <a class="nav-link" href="/generos">Géneros</a>
                        <a class="nav-link" href="/items">Items</a>
                    </div>
                </div>
            </nav>
            @endif
        </div>
        
        <div id="page-content" class="container py-3">
            @yield('content')
        </div>

        <div class="fixed-bottom">
            <div class="bg-danger d-none d-flex justify-content-end p-3">
                <a class="btn btn-danger" href="/">Aplicación</a>
            </div>
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Eliminación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ¿Seguro que desea eliminar esto?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Cancelar
                        </button>
                        <form action="" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('js/app.js')}}"></script>
    @yield('scripts')
</body>
</html>