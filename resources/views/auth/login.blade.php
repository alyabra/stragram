@extends('layouts.app')
{{-- la directiva apunta directamente a views --}}

@section('titulo')
    Inicia sesion en DevSagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center p-5">
        <div class="md:w-6/12 p-10">
            {{-- asset apunta directamente a public --}}
            <img src="{{asset('img/registrar.jpg')}}"  alt="Imagen registro de usuarios" class="md:flex md:justify-center md:gap-4 md:items-center">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form method="POST" action="{{ route('login')}}" novalidate>
                {{-- PAra evitar ataques tiene laravel ... para sol problema agragar la siguiente directiva --}}
                @csrf

                @if(session('mensaje'))
                    <p class="bg-red-500 text-white
                    my-2 rounded-lg text-sm text-center">
                    {{session('mensaje')}}
                </p>
                @endif

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
                    <input type="checkbox" name="remember"><label class="text-gray-500 text-sm" for="remember">Mantener mi sesión abierta</label> 
                </div>
            
                <input type="submit"
                    value="Iniciar sesion"
                    class="bg-sky-600 hover:bg-sky-700 uppercase transition-colors cursor-pointer
                    font-bold w-full p-3 text-white rounded-lg
                    "
                >
            </form>
        </div>
    </div>
@endsection