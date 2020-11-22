@extends('../layouts.admin')

@section('title')
    Categorias
@endsection

@section('content')
<div class="p-3">
    <h1 class="text-center">Editar categoría</h1>

    @if($error != "")
    <div class="alert alert-danger" role="alert">
        {{$error}}
    </div>
    @endif

    <form action="/categorias/{{$categoria->id}}" class="form-row" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group col-9">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{$categoria->nombre}}">
        </div>
        <div class="form-group col-3">
            <label for="color">Color</label>
            <input type="color" name="color" class="form-control" value="{{$categoria->color}}">
        </div>

        <div class="col-12 text-center">
            <button class="btn btn-success" type="submit">Actualizar</button>
        </div>
    </form>
</div>
@endsection