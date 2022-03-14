@extends('layouts.app')
@section('content')
    {{-- <p>{{ $receta }}</p> --}}
    <article class="contenido-receta container">
        <h1 class="text-center mb-4">{{$receta->nombre}}</h1>
        <div class="imagen-receta">
            <img class="w-100 rounded" src="/storage/{{$receta->imagen}}" alt="">
        </div>
        <div class="receta-data">
            <p>
                <span class="font-weight-bold text-primary">Categoria: </span>
                <span>{{$receta->categoriaReceta->nombre}}</span>
            </p>
            <p>
                <span class="font-weight-bold text-primary">Creador de la receta: </span>
                <span>{{$receta->autorReceta->name}}</span>
            </p>
            <p>
                <span class="font-weight-bold text-primary">Hora de creacion</span>
                <span>{{date('d-m-Y',strtotime($receta->created_at))}}</span>
            </p>
            <div class="ingredientes">
                <h2 class="my-3 text-primary">Ingredientes</h2>
                {{-- con los signos de exclamacion retiramos las etiquetas HTML --}}
                <span>{!!$receta->ingredientes!!}</span>
            </div>
            <div class="preparacion">
                <h2 class="my-3 text-primary">Preparacion</h2>
                {{-- con los signos de exclamacion retiramos las etiquetas HTML --}}
                <span>{!!$receta->preparacion!!}</span>
            </div>
        </div>
    </article>
@endsection
