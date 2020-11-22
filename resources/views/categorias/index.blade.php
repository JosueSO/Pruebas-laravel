@extends('../layouts.admin')

@section('title')
    Categorias
@endsection

@section('content')
<div class="p-3">
    <h1 class="text-center">Categorías</h1>

    <div class="d-flex justify-content-end mb-2">
        <a href="/categorias/create" class="btn btn-primary">
            Agregar
            <i class="fas fa-plus"></i>
        </a>
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Color</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr>
                <td scope="row">{{$categoria->id}}</td>
                <td>{{$categoria->nombre}}</td>
                <td>{{$categoria->color}}</td>
                <td>
                    <a class="btn btn-warning" href="/categorias/{{$categoria->id}}/edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button class="btn btn-danger" type="submit" onclick="modalEliminacion({{$categoria->id}})">
                        &times;
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
    <script>
        function modalEliminacion(id) {
            //Mensaje
            $('#modalDelete .modal-body').text("¿Esta seguro de eliminar esta categoría?");
            //Ruta de eliminación
            $('#modalDelete form').attr("action", "/categorias/" + id);
            //Mostrar el modal
            $('#modalDelete').modal('show');
        }
    </script>
@endsection