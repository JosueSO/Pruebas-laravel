@extends('../layouts.app')

@section('title')
    Mi perfil
@endsection

@section('content')
    <h1 class="text-center">Mi perfil</h1>

    <div class="row mx-0">
        <div class="col-3">
            <div id="user_profile_image">
                <img src="https://picsum.photos/400/400" alt="" class="img-fluid">
            </div>
        </div>
        <div class="col-9">
            <h2>Datos del usuario</h2>
        </div>
    </div>
@endsection