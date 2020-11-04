@extends('../layouts.app')

@section('title')
    Categorias
@endsection

@section('content')

    <h3>Categorías</h3>

    <a href="/categorias/create">Agregar</a>

    <ul class="list-group">
    @foreach($categorias as $item)
        <li class="list-group-item" style="color: {{$item->color}};">{{$item->nombre}}</li>
    @endforeach
    </ul>

@endsection