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
                <a href="{{$perfil->perfiluser->url}}">Visitar Sitio Web</a>
                <div class="biografia">
                    {{$perfil->biografia}}
                </div>
            </div>
        </div>
    </div>
@endsection

