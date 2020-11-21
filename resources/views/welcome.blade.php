@extends('./layouts.app')

@section('title')
  Inicio
@endsection

@section('content')
  <div class="display-1 text-center">
    Carrusel
  </div>

  <div id="categorias">
    @for($i = 0; $i < 3; $i++)
    <div class="categoria">
      <div class="h3">
        Categoría {{$i}}
      </div>
      <div class="categoria-items row flex-nowrap">
        @for($j = 0; $j < 10; $j++)
        <div class="categoria-item col-4 col-md-2">
          <a class="card" href="/app/items/{{$j}}">
            <img src="https://picsum.photos/150/250" alt="">
            <div class="card-body">
              <div class="card-title">
                Nombre item
              </div>
              <div class="card-text">
                <i class="fas fa-thumbs-up"></i>
                89%
              </div>
            </div>
          </a>
        </div>
        @endfor
      </div>
    </div>
    @endfor
  </div>
@endsection