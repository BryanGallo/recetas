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
                        <td>{{$userReceta->categoria_id}}</td>
                        <td>
                            <a href="" class="btn btn-success">Ver</a>
                            <a href="" class="btn btn-primary">Editar</a>
                            <a href="" class="btn btn-danger">Eliminar</a>
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
