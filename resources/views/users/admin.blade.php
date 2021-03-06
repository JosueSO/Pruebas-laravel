@extends('../layouts.admin')

@section('title')
    Mi perfil
@endsection

@section('content')
<div class="d-flex flex-column flex-md-row flex-md-wrap justify-content-center">
    <a class="btn btn-outline-dark m-2" style="font-size: 8em" href="/users">
        <h5 class="text-center">Usuarios</h5>
        <i class="fas fa-users"></i>
    </a>
    <a class="btn btn-outline-dark m-2" style="font-size: 8em" href="/categorias">
        <h5 class="text-center">Categorías</h5>
        <i class="fas fa-tags"></i>
    </a>
    <a class="btn btn-outline-dark m-2" style="font-size: 8em" href="/generos">
        <h5 class="text-center">Géneros</h5>
        <i class="fas fa-hashtag"></i>
    </a>
    <a class="btn btn-outline-dark m-2" style="font-size: 8em" href="/items">
        <h5 class="text-center">Items</h5>
        <i class="fas fa-photo-video"></i>
    </a>
</div>
@endsection