@extends('layouts.app')


@section('botones')
    <a href={{ route('recetas.index') }} class="btn btn-primary mr-2 text-white">Lista Recetas</a>
@endsection
@section('content')
    <h2 class="text-center mb-5 ">Crear nueva receta</h2>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="POST" action={{route('recetas.store')}} novalidate>
                @csrf
                <div class="form-group">
                    <label for="">Nombre de la receta</label>
                    <input type="text" name="nombre" id="nombre" class="form-control @error('nombre')
                        is-invalid
                    @enderror" placeholder="nombre" value="{{old('nombre')}}">
                    @error('nombre')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary " value="Agregar Receta">
                </div>
            </form>
        </div>
    </div>
@endsection
