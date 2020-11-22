@extends('../layouts.admin')

@section('title')
Usuarios
@endsection

@section('content')
<h1 class="text-center">Usuarios</h1>

<div class="d-flex justify-content-end mb-2">
    <a href="/users/create" class="btn btn-primary">
        Agregar
        <i class="fas fa-plus"></i>
    </a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td scope="row">{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                <button class="btn btn-danger" type="submit" onclick="modalEliminacion({{$user->id}})">
                    &times;
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('scripts')
<script>
    function modalEliminacion(id) {
        //Mensaje
        $('#modalDelete .modal-body').text("¿Esta seguro de eliminar este usuario?");
        //Ruta de eliminación
        $('#modalDelete form').attr("action", "/users/" + id);
        //Mostrar el modal
        $('#modalDelete').modal('show');
    }
</script>
@endsection