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
    <h1 class="text-center">Editar Perfil</h1>
    {{-- <p>{{ $perfil }}</p> --}}
    <div class="row justify-content-center mt-5">
        <div class="col-md-10 bg-white p-3">
            <form method="POST" action={{ route('perfiles.update',['perfil'=>$perfil->id]) }} enctype="multipart/form-data" novalidate>
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nombre">Nombre del Perfil</label>
                    <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror"
                        placeholder="nombre" value="{{ $perfil->nombre }}">
                    @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="url">Sitio Web</label>
                    <input type="text" name="url" id="nombre" class="form-control @error('nombre') is-invalid @enderror"
                        placeholder="Sitio Web" value="{{ $perfil->nombre }}">
                    @error('url')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="biografia">Biografia</label>
                    <input name="biografia" id="biografia" class="form-control @error('biografia') is-invalid @enderror"
                        value="{{ $perfil->preparacion }}" type="hidden" id="preparacion">
                    <trix-editor input='preparacion' class="form-control @error('preparacion') is-invalid @enderror">
                    </trix-editor>
                    @error('biografia')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="img">Imagen</label>
                    <input type="file" name="img" id="img" class="form-control @error('img') is-invalid @enderror">
                    @if ($perfil->imagen)
                        <div class="mt-4">
                            <p>Imagen Actual</p>
                            {{-- <img src="/storage/{{$perfil->imagen}}" alt="Imagen" --}}
                            {{-- style="width: 300px;border-radius: 20px"> --}}
                        </div>
                    @endif

                    @error('img')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group">
                    <input type="submit" class="btn btn-primary " value="Actualizar Receta">
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
