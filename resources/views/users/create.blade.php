@extends('../layouts.admin')

@section('title')
    Usuarios
@endsection

@section('content')
<h1 class="text-center">Crear usuario</h1>

@if($error != "")
<div class="alert alert-danger" role="alert">
    {{$error}}
</div>
@endif

<form action="/users" class="form-row" method="POST">
    @csrf
    @method('POST')

    <div class="form-group col-12 col-md-6">
        <label for="name">Nombre</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group col-12 col-md-3">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="form-group col-12 col-md-3">
        <label for="confirm_email">Confirmar Email</label>
        <input type="email" name="confirm_email" class="form-control">
    </div>

    <div class="form-group col-12 col-md-3">
        <label for="password">Contraseña</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="form-group col-12 col-md-3">
        <label for="confirm_password">Confirmar Contraseña</label>
        <input type="password" name="confirm_password" class="form-control">
    </div>
    <div class="form-group col-12 col-md-3">
        <label for="telefono">Teléfono</label>
        <input type="tel" name="telefono" class="form-control">
    </div>

    <div class="col-12 text-center">
        <button class="btn btn-success" type="submit">Guardar</button>
    </div>
</form>
@endsection