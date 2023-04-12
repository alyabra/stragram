@extends('layouts.app')
{{-- la directiva apunta directamente a views --}}

@section('titulo')
    Registrate en Devstagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center p-5">
        <div class="md:w-6/12 p-10">
            {{-- asset apunta directamente a public --}}
            <img src="{{asset('img/registrar.jpg')}}"  alt="Imagen registro de usuarios" class="md:flex md:justify-center md:gap-4 md:items-center">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{route('register')}}" method="POST" novalidate>
                {{-- PAra evitar ataques tiene laravel ... para sol problema agragar la siguiente directiva --}}
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold ">Nombre</label>
                    <input 
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Tu nombre"
                        class="border p-3 w-full rounded-lg
                        @error('name')
                            border-red-500
                        @enderror"
                        {{-- el herlper old para no volver a llenar el campo --}}
                        value="{{old('name')}}"
                    >
                    @error('name')
                        <p class="bg-red-500 text-white
                        my-2 rounded-lg text-sm text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold ">Username</label>
                    <input 
                        type="text"
                        id="username"
                        name="username"
                        placeholder="Tu nombre de usuario"
                        class="border p-3 w-full rounded-lg
                        @error('username')
                            border-red-500
                        @enderror"
                        {{-- el herlper old para no volver a llenar el campo --}}
                        value="{{old('username')}}"
                    >
                    @error('username')
                    <p class="bg-red-500 text-white
                    my-2 rounded-lg text-sm text-center">{{$message}}</p>
                @enderror
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold ">Email</label>
                    <input 
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Tu nombre de usuario"
                        class="border p-3 w-full rounded-lg
                        @error('email')
                            border-red-500
                        @enderror"
                        {{-- el herlper old para no volver a llenar el campo --}}
                        value="{{old('email')}}"
                    >
                    @error('email')
                    <p class="bg-red-500 text-white
                    my-2 rounded-lg text-sm text-center">{{$message}}</p>
                @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold ">Passoword</label>
                    <input 
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Tu nombre de usuario"
                        class="border p-3 w-full rounded-lg
                        @error('password')
                            border-red-500
                        @enderror"
                        {{-- el herlper old para no volver a llenar el campo --}}
                        value="{{old('password')}}"
                    >
                    @error('password')
                    <p class="bg-red-500 text-white
                    my-2 rounded-lg text-sm text-center">{{$message}}</p>
                @enderror
                </div>
            
                      <div class="mb-5">
                <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold ">Confirma contraseña</label>
                <input 
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Repite password"
                    class="border p-3 w-full rounded-lg
                        @error('password')
                            border-red-500
                        @enderror"
                >
                {{-- @error('password')
                <p class="bg-red-500 text-white
                my-2 rounded-lg text-sm text-center">{{$message}}</p>
            @enderror --}}
            </div>

            <input type="submit"
                value="Crear cuenta"
                class="bg-sky-600 hover:bg-sky-700 uppercase transition-colors cursor-pointer
                 font-bold w-full p-3 text-white rounded-lg
                "
            >
            </form>
        </div>
    </div>
@endsection