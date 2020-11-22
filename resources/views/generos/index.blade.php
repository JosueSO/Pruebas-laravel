@extends('../layouts.admin')

@section('title')
    Generos
@endsection

@section('content')
<h1 class="text-center">Generos</h1>

<div class="d-flex justify-content-end mb-2">
    <button class="btn btn-primary" data-toggle="modal" data-target="#modalCrearGenero">
        Agregar
        <i class="fas fa-plus"></i>
    </button>
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
        @foreach($generos as $genero)
        <tr>
            <td scope="row">{{$genero->id}}</td>
            <td>{{$genero->nombre}}</td>
            <td>{{$genero->descripcion}}</td>
            <td>
                <button class="btn btn-warning" type="submit" onclick="modalEdicion({{$genero->id}})">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-danger" type="submit" onclick="modalEliminacion({{$genero->id}})">
                    &times;
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('modales')
<!-- Modal -->
<div class="modal fade" id="modalCrearGenero" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crear género</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/generos" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" require>
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" name="descripcion" class="form-control" require>
                    </div>

                    <div class="text-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="submit" class="btn btn-success">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalEditarGenero" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar género</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" require id="genero_nombre">
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" name="descripcion" class="form-control" require id="genero_descripcion">
                    </div>

                    <div class="text-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="submit" class="btn btn-success">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function modalEdicion(id) {
        //Ruta
        $('#modalEditarGenero form').attr("action", "/generos/" + id);

        //Datos traidos por AJAX
        $.get("/generos/" + id + "/edit", function(data, status){
            //Asigna valores
            $('#genero_nombre').val(data.nombre);
            $('#genero_descripcion').val(data.descripcion);

            //Mostrar el modal
            $('#modalEditarGenero').modal('show');
        });
    }

    function modalEliminacion(id) {
        //Mensaje
        $('#modalDelete .modal-body').text("¿Esta seguro de eliminar este genero?");
        //Ruta de eliminación
        $('#modalDelete form').attr("action", "/generos/" + id);
        //Mostrar el modal
        $('#modalDelete').modal('show');
    }
</script>
@endsection