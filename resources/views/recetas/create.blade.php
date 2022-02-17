@extends('layouts.app')

{{-- Estlios --}}
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css"
        integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('botones')
    <a href={{ route('recetas.index') }} class="btn btn-primary mr-2 text-white">Lista Recetas</a>
@endsection
@section('content')
    <h2 class="text-center mb-5 ">Crear nueva receta</h2>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="POST" action={{ route('recetas.store') }} enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-group">
                    <label for="">Nombre de la receta</label>
                    <input type="text" name="nombre" id="nombre"
                        class="form-control @error('nombre')
                        is-invalid @enderror"
                        placeholder="nombre" value="{{ old('nombre') }}">
                    @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Categoria</label>
                    <select name="categoria" id="categoria" class="form-control @error('categoria') is-invalid @enderror">
                        <option value="" disabled selected="selected">Eliga la categoria</option>
                        {{-- recorremos nuestra tabla c=donde nuestos 2 valores son la clave (id) y valor --}}
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ old('categoria') ==$categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                    @error('categoria')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- {{$categorias}} --}}

                <div class="form-group">
                    <label for="">Ingredientes</label>
                    <input name="ingredientes"
                        class="form-control @error('ingredientes')
                        is-invalid @enderror"
                        placeholder="ingredientes" value="{{ old('ingredientes') }}" type="hidden" id="ingredientes">
                    <trix-editor input='ingredientes'
                        class="form-control @error('ingredientes')
                        is-invalid @enderror">
                    </trix-editor>
                    @error('ingredientes')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Preparacion</label>
                    <input name="preparacion"
                        class="form-control @error('preparacion')
                        is-invalid @enderror"
                        value="{{ old('preparacion') }}" type="hidden" id="preparacion">
                    <trix-editor input='preparacion'
                        class="form-control @error('preparacion')
                        is-invalid @enderror">
                    </trix-editor>
                    @error('preparacion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="img">Imagen</label>
                    <input type="file"
                        name="img" id="img" class="form-control @error('img')
                        is-invalid @enderror">
                    @error('img')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
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
{{-- Scripts --}}
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"
        integrity="sha512-2RLMQRNr+D47nbLnsbEqtEmgKy67OSCpWJjJM394czt99xj3jJJJBQ43K7lJpfYAYtvekeyzqfZTx2mqoDh7vg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
@endsection
