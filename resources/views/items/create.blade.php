@extends('../layouts.admin')

@section('title')
    Items
@endsection

@section('content')
<div class="p-3">
    <h1 class="text-center">Crear item</h1>

    @if($error != "")
    <div class="alert alert-danger" role="alert">
        {{$error}}
    </div>
    @endif

    <form action="/items" class="form-row" method="POST">
        @csrf
        @method('POST')

        <div class="form-group col-12 col-md-4">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control">
        </div>
        <div class="form-group col-12 col-md-8">
            <label for="descripcion">Descripcion</label>
            <input type="text" name="descripcion" class="form-control">
        </div>

        <div class="col-12 text-center">
            <button class="btn btn-success" type="submit">Guardar</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
</script>
@endsection