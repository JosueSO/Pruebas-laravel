@extends('../layouts.app')

@section('title')
    Categorias
@endsection

@section('content')

    <h3>Editar categoría</h3>

    @if($error != "")
    <div class="alert alert-danger" role="alert">
        {{$error}}
    </div>
    @endif

    <form action="/categorias/{{$item->id}}" class="form-row" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group col-9">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{$item->nombre}}">
        </div>
        <div class="form-group col-3">
            <label for="color">Color</label>
            <input type="color" name="color" class="form-control" value="{{$item->color}}">
        </div>

        <div class="col-12 text-center">
            <button class="btn btn-success" type="submit">Actualizar</button>
        </div>
    </form>

@endsection