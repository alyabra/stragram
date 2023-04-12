@extends('layouts.app')

@section('titulo')
    Editar Perfil: {{ auth()->user()->username}}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form method="POST" action="{{ route('perfil.store') }}" 
                enctype="multipart/form-data"
                class="mt-10 md:mt-8"
            >
            @csrf
            <div class="mb-5">
                <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                    username
                </label>
                <input type="text" name="username" id="username"
                    placeholder="Tu nombre usuario"
                    class="border p-3 w-full rounded-lg @error('username')  border-red-500 @enderror"
                    value="{{ auth()->user()->username}}"
                >
                @error('username')
                    <p class="bg-red-500 text-white rounded-md my-10 text-sm text-center p-2
                    ">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">
                    Imagen perfil
                </label>
                <input type="file" name="imagen" id="imagen"
                    accept=".png, .jpg, .jpeg"
                    class="border p-3 w-full rounded-lg"
                >
                @error('imagen')
                <p class="bg-red-500 text-white rounded-md my-10 text-sm text-center p-2
                ">{{ $message }}</p>
            @enderror
            </div>
            <input type="submit" value="Guardar cambios" name="" id=""
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold p-3 text-white rounded-md w-full"
            >
            </form>
        </div>
    </div>
@endsection