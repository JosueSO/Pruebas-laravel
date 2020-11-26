@extends('../layouts.admin')

@section('title')
    Categorias
@endsection

@section('content')
<h1 class="text-center">Categorías</h1>

<div class="d-flex justify-content-end mb-2">
    <button class="btn btn-primary" onclick="modalAgregar()">
        Agregar
        <i class="fas fa-plus"></i>
    </button>
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
                <button class="btn btn-warning" onclick="modalEdicion({{$categoria->id}})">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-danger" onclick="modalEliminacion({{$categoria->id}})">
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
<div class="modal fade" id="modalAgregarCategoria" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
             </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert" id="error">
                    
                </div>

                <form action="" class="form-row" method="POST" id="form-categoria">
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
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function modalAgregar() {
        $("#error").hide(0);

        $("#form-categoria [name='nombre']").val("");
        $("#form-categoria [name='color']").val("");
        $("#form-categoria [name='_method']").val("POST");
        $("#form-categoria").attr("action", "/categorias");

        $("#modalAgregarCategoria").modal('show');   
    }

    function modalEliminacion(id) {
        //Mensaje
        $('#modalDelete .modal-body').text("¿Esta seguro de eliminar esta categoría?");
        //Ruta de eliminación
        $('#modalDelete form').attr("action", "/categorias/" + id);
        //Mostrar el modal
        $('#modalDelete').modal('show');
    }

    function modalEdicion(id) {
        $.get("/categorias/" + id, function(data) {
            $("#error").hide(0);
            
            $("#form-categoria [name='nombre']").val(data.nombre);
            $("#form-categoria [name='color']").val(data.color);
            $("#form-categoria [name='_method']").val("PUT");
            $("#form-categoria").attr("action", "/categorias/" + id);

            $("#modalAgregarCategoria").modal('show');
        });
    }

    $(document).ready(function(){
        $("#error").hide(0);

        $("#form-categoria").on("submit", function(e){
            e.preventDefault();

            //Ruta dinámica entre STORE y UPDATE
            var url = $("#form-categoria").attr("action");

            //Creación de objeto JSON
            var categoria = {
                _token: $("#form-categoria [name='_token']").val(),
                _method: $("#form-categoria [name='_method']").val(),
                nombre: $("#form-categoria [name='nombre']").val(),
                color: $("#form-categoria [name='color']").val()
            };

            $.post(url, categoria, function(data, status){
                //Se recarga la página para que se actualice la tabla
                location.reload();
            }).fail(function(data) {
                //Se carga mensaje al modal
                $("#error").text(data.responseJSON.message);
                //Se muestra el modal
                $("#error").show(1000);
            });
        });
    });
</script>
@endsection