@extends('layouts.app') 

@section('titulo')
    Crear un nueva publicación
@endsection

@push('styles')
{{-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> --}}

<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{route('imagenes.store')}}"
             id="dropzone" 
             method="POST"
             class="dropzone border-dashed
             border-2 w-full h-96 
             rounded flex flex-col 
             justify-center items-center">
                @csrf
            </form>
        </div>
        <div class="md:w-1/2 px-10 bg-white p-10 rounded-lg shadow-xl mt-10  md_mt-0">
            <form action="{{route('posts.store')}}" method="POST" novalidate>

                {{-- PAra evitar ataques tiene laravel ... para sol problema agragar la siguiente directiva --}}
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold ">Titulo</label>
                    <input 
                        type="text"
                        id="titulo"
                        name="titulo"
                        placeholder="Titulo"
                        class="border p-3 w-full rounded-lg
                        @error('name')
                            border-red-500
                        @enderror"
                        {{-- el herlper old para no volver a llenar el campo --}}
                        value="{{old('titulo')}}"
                    >
                    @error('titulo')
                        <p class="bg-red-500 text-white
                        my-2 rounded-lg text-sm text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold ">Descripcion</label>
                    <textarea 
                        type="text"
                        id="descripcion"
                        name="descripcion"
                        placeholder="Descripcion"
                        class="border p-3 w-full rounded-lg
                        @error('descripcion')
                            border-red-500
                        @enderror"
                        {{-- el herlper old para no volver a llenar el campo --}}
                    >{{old('descripcion')}}</textarea>
                    @error('descripcion')
                        <p class="bg-red-500 text-white
                        my-2 rounded-lg text-sm text-center">{{$message}}</p>
                    @enderror
            </div>

            <div class="mb-5">
                <input type="hidden" name="imagen"
                    value="{{ old('imagen')}}"
                >
                @error('imagen')
                <p class="bg-red-500 text-white
                my-2 rounded-lg text-sm text-center">{{$message}}</p>
            @enderror
            </div>

            <input type="submit"
                value="Publicar"
                class="bg-sky-600 hover:bg-sky-700 uppercase transition-colors cursor-pointer
                 font-bold w-full p-3 text-white rounded-lg
                "
            >
            </form>
        </div>
    </div>
@endsection
