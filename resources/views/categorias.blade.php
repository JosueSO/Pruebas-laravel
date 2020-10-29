@extends('layouts.app')

@section('content')

    <h3>Categoría {{$id}}</h3>

    <ul class="list-group">
    @foreach($items as $item)
    
        <li class="list-group-item">{{$item}}</li>

    @endforeach
    </ul>

@endsection

@section('title')

    {{$title}}

@endsection

@section('scripts')

    <script>
    
        alert('Hola mundo');

    </script>

@endsection