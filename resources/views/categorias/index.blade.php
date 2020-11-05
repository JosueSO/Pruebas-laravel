@extends('../layouts.app')

@section('title')
    Categorias
@endsection

@section('content')

    <h3>Categorías</h3>

    <a href="/categorias/create">Agregar</a>

    <ul class="list-group">
    @foreach($categorias as $item)
        <li class="list-group-item">
            <a href="/categorias/{{$item->id}}/edit" style="color: {{$item->color}};">
                {{$item->nombre}}
            </a>
            <form action="/categorias/{{$item->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger" type="submit">Eliminar</button>
            </form>
        </li>
    @endforeach
    </ul>

@endsection