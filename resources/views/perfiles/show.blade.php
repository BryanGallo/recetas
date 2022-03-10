@extends('layouts.app')
@section('content')
    {{-- {{$perfil->perfilUser->userRecetas}} --}}
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                {{-- imagen --}}
            </div>
            <div class="col-md-7">
                {{-- chef --}}
                <h2 class="text-center mb-2 text-primary">
                    {{$perfil->perfilUser->name}}
                </h2>

            </div>
        </div>
    </div>
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

</body>
</html>
