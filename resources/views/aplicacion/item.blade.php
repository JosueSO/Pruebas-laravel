@extends('../layouts.app')

@section('title')
Item
@endsection

@section('content')
<div class="row">
    <div class="d-none d-md-flex col-md-3 py-2">
        <h4>Mejores de la categoría</h4>
        <ul class="list-group">
            @for($i = 0; $i < 10; $i++)
            <li class="list-group-item list-group-item-action">
                <i class="fas fa-thumbs-up"></i>
                Item {{$i + 1}}
            </li>
            @endfor
        </ul>
    </div>
    <div class="col-12 col-md-9 py-2">
        <img src="https://picsum.photos/1800/800" alt="" class="img-fluid">
        <div class="row mt-3 mx-0">
            <div class="d-none d-md-flex col-md-3">
                <img src="https://picsum.photos/400/670" alt="" class="img-fluid">
            </div>
            <div class="col-12 col-md-9 bg-light">
                <h1 class="text-center">Nombre del item</h1>
                <h3 class="text-center">Crítica</h3>
                <p class="text-justify">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus accusamus quaerat harum
                    dolorem ullam magni cupiditate dolore illum eum, quas esse nemo voluptates minus ipsam illo
                    quibusdam sint iste hic!
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veniam eveniet quasi explicabo quas ex
                    quidem vel quia nesciunt, consequuntur blanditiis nam dolorem dolores, veritatis fuga quisquam
                    recusandae perferendis provident voluptatibus.
                </p>
                <div class="text-center">
                    <button class="btn btn-outline-light text-dark vote-button">
                        <i class="fas fa-thumbs-up"></i>
                        89%
                    </button>
                    <button class="btn btn-outline-light text-dark vote-button">
                        <i class="fas fa-thumbs-down"></i>
                        11%
                    </button>
                </div>
            </div>
            <div class="card mt-3 w-100">
                <div class="card-header">
                    <h4>Fotos</h4>
                </div>
                <div class="card-body row flex-nowrap categoria-items m-0 px-0">
                    @for($i = 0; $i < 10; $i++)
                    <div class="col-2 categoria-item">
                        <img src="https://picsum.photos/400/400" alt="" class="img-fluid">
                    </div>
                    @endfor
                </div>
            </div>

            <div class="card mt-3 w-100">
                <div class="card-header">
                    <h4>Información</h4>
                </div>
                <div class="card-body">
                    <p class="text-justify">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perspiciatis amet quos nobis, incidunt
                        praesentium eaque nihil? Corrupti beatae soluta minus corporis accusantium magnam consequuntur
                        et! Fugit earum id provident illum.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos sit, dolor sapiente similique quod
                        neque delectus quaerat laboriosam ipsum libero assumenda, cupiditate ut, non earum facere. Quasi
                        est ipsum accusantium?
                    </p>

                    <table class="table table-borderless">
                        <tr>
                            <th>Género:</th>
                            <td>Drama</td>
                        </tr>
                        <tr>
                            <th>Dirigida por:</th>
                            <td>Nombre directores</td>
                        </tr>
                        <tr>
                            <th>Escrita por:</th>
                            <td>Nombre escritores</td>
                        </tr>
                        <tr>
                            <th>Estreno:</th>
                            <td>18 de septiembre, 2020</td>
                        </tr>
                        <tr>
                            <th>Duración:</th>
                            <td>120min</td>
                        </tr>
                        <tr>
                            <th>Compañía</th>
                            <td>Disney Company</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card mt-3 w-100">
                <div class="card-header">
                    <h4>Calificar</h4>
                </div>
                <div class="card-body form-row">
                    <div class="d-none d-md-flex col-8">
                        <textarea name="" id="" rows="6" class="form-control" placeholder="Escribe algo..."></textarea>
                    </div>
                    <div class="col-12 col-md-4 text-center">
                        <div>
                            <button class="btn btn-outline-light text-dark vote-button">
                                <i class="fas fa-thumbs-up"></i>
                            </button>
                            <button class="btn btn-outline-light text-dark vote-button">
                                <i class="fas fa-thumbs-down"></i>
                            </button>
                        </div>
                        <div>
                            <button class="btn btn-primary">
                                Enviar
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-3 w-100">
                <div class="card-header">
                    <h4>Reseñas</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection