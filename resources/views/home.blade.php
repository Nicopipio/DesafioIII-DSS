

@extends('layouts.app')
@section('title', 'Home')
@section('content')


<div class="flex flex-col items-center">
    <div class="mt-8 rounded-full overflow-hidden border-4 border-black border-primary">

        <!-- Verifica si el usuario tiene una foto de perfil -->
        @if(auth()->user()->photo)
            <img src="{{ asset('uploads/' . auth()->user()->photo) }}" alt="Foto de perfil" class="w-48 h-48 object-cover" style="border-radius: 50%;">
        @endif
    </div>

    <div class="mt-4">
        <form action="{{ route('user.updatePhoto') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="photoInput" class="btn btn-primary rounded-full py-2 px-4 cursor-pointer">
                Seleccionar Foto
            </label>

            <!-- Input oculto para seleccionar la foto -->
            <input id="photoInput" type="file" name="photo" accept="image/*" class="hidden">
            <button type="submit" class="btn btn-primary mt-2">Actualizar Foto</button>
        </form>
    </div>
    <h1 class="text-5xl pt-24">Bienvenido <b>{{ auth()->user()->name }}</b></h1>
    <h1 class="text-5xl pt-4">Tu correo electrónico es: <b>{{ auth()->user()->email }}</b></h1>
</div>

@endsection
<style>
   
    #photoInput {
        display: none;
    }

    .btn-primary {
        background-color: #000; 
        border: none;
        color: white;
        padding: 10px 24px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        transition-duration: 0.4s;
        cursor: pointer;
        border-radius: 12px;
    }

    .btn-primary:hover {
        background-color: #834066; 
    }
</style>