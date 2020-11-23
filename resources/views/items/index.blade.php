@extends('../layouts.admin')

@section('title')
    Items
@endsection

@section('content')
<h1 class="text-center">Items</h1>

<div class="d-flex justify-content-end mb-2">
    <a href="/items/create" class="btn btn-primary">
        Agregar
        <i class="fas fa-plus"></i>
    </a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
        <tr>
            <td scope="row">{{$item->id}}</td>
            <td>{{$item->nombre}}</td>
            <td>{{$item->descripcion}}</td>
            <td>
                <a class="btn btn-warning" href="/items/{{$item->id}}/edit">
                    <i class="fas fa-edit"></i>
                </a>
                <button class="btn btn-danger" type="submit" onclick="modalEliminacion({{$item->id}})">
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
        $('#modalDelete .modal-body').text("¿Esta seguro de eliminar este item?");
        //Ruta de eliminación
        $('#modalDelete form').attr("action", "/items/" + id);
        //Mostrar el modal
        $('#modalDelete').modal('show');
    }
</script>
@endsection