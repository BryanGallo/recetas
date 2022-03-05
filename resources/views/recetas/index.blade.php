@extends('layouts.app')
@section('content')
@section('botones')
{{-- para llamar rutas lo hacemos con rutas --}}
    <a href={{route('recetas.create')}} class="btn btn-primary mr-2 text-white">Recetas</a>
@endsection
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    {{-- traer la barra de navegacion y codigo repetitivo --}}


        <h1 class="text-center mb-5">
            Administra Recetas
        </h1>
        {{-- {{$userRecetas}} --}}
        <div class="col-md-10 mx-auto bg-white p-3">
            <table class="table text-center">
                <thead class="bg-primary text-ligth">
                    <tr>
                        <th >Nombre</th>
                        <th>Categoria</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $userRecetas as $userReceta )
                    <tr>
                        <td>{{$userReceta->nombre}}</td>
                        <td>{{$userReceta->categoriaReceta->nombre}}</td>
                        <td>
                            <a href="{{route('recetas.show',['receta'=>$userReceta->id])}}" class="btn btn-success d-block mb-1">Ver</a>
                            <a href="{{route('recetas.edit',['receta'=>$userReceta->id])}}" class="btn btn-primary d-block mb-1">Editar</a>
                            {{-- <form method="POST" action="{{route('recetas.destroy',['receta'=>$userReceta->id])}}"> --}}
                                @csrf
                                @method('delete')
                                {{-- <input type="submit" class="btn btn-danger d-block mb-1 w-100" value="Eliminar"> --}}
                                {{-- traemos el componenete de Vuejs --}}
                                <eliminar-receta receta-id={{$userReceta->id}}></eliminar-receta>
                                {{-- </form> --}}
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        {{-- lado izquierdo del as colocamos el identificador del dato o datos que tratamos de recibir --}}
        {{-- @yield  indica que va indicar el distinto contenido --}}
    @endsection



</body>

</html>
