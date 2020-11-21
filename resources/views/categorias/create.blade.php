@extends('../layouts.admin')

@section('title')
    Categorias
@endsection

@section('content')
<div class="p-3">
    <h1 class="text-center">Crear categoría</h1>

    @if($error != "")
    <div class="alert alert-danger" role="alert">
        {{$error}}
    </div>
    @endif

    <form action="/categorias" class="form-row" method="POST">
        @csrf
        @method('POST')

        <div class="form-group col-9">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control">
        </div>
        <div class="form-group col-3">
            <label for="color">Color</label>
            <input type="color" name="color" class="form-control">
        </div>

        <div class="col-12 text-center">
            <button class="btn btn-success" type="submit">Guardar</button>
        </div>
    </form>
</div>
@endsection