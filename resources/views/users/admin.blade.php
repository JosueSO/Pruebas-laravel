@extends('../layouts.admin')

@section('title')
    Mi perfil
@endsection

@section('content')
    <div class="w-50 mx-auto p-3">
        <div class="d-flex flex-wrap justify-content-center">
            <a class="btn btn-outline-dark m-2" style="font-size: 8em" href="/users">
                <h5 class="text-center">Usuarios</h5>
                <i class="fas fa-users"></i>
            </a>
            <a class="btn btn-outline-dark m-2" style="font-size: 8em" href="/categorias">
                <h5 class="text-center">Categorías</h5>
                <i class="fas fa-tags"></i>
            </a>
            <a class="btn btn-outline-dark m-2" style="font-size: 8em" href="/">
                <h5 class="text-center">Géneros</h5>
                <i class="fas fa-hashtag"></i>
            </a>
            <a class="btn btn-outline-dark m-2" style="font-size: 8em" href="/">
                <h5 class="text-center">Items</h5>
                <i class="fas fa-photo-video"></i>
            </a>
        </div>
    </div>
@endsection