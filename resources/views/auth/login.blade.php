@extends('layout.app')

@section('title')
    Iniciar Sesión en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:items-center md:gap-5">
        <div class="md:w-2/5 mx-4 md:mx-0">
            <img class="border rounded-2xl md:rounded-none" src="{{ asset('img/login.jpg') }}" alt="RegistrarImg">
        </div>
        <div class="md:w-4/12">
            <form method="POST" action="{{ route('login') }}"
            class="bg-white rounded-lg m-2 p-4 shadow-xl" novalidate>
                @csrf
                <div class="flex flex-col m-2 mb-3">
                    @error('login-error')
                        <p class="text-white font-bold bg-red-800 rounded-md
                            px-3 py-1 w-full mt-1 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col m-2 mb-3">
                    <label for="email" class="uppercase text-gray-700 font-bold pl-1">
                        Email
                    </label>
                    <input 
                        type="email" 
                        id="email"
                        name="email"
                        placeholder="Tu Email"
                        value="{{ old("email") }}"
                        class="rounded-lg border border-gray-400 p-2"
                    />
                    @error('email')
                        <p class="text-white font-bold bg-red-800 rounded-md
                        px-3 py-1 w-full mt-1">{{ $message }}</p>
                    @enderror
                </div>    
                <div class="flex flex-col m-2 mb-3">
                    <label for="password" class="uppercase text-gray-700 font-bold pl-1">
                        Contraseña
                    </label>
                    <input 
                        type="password" 
                        id="password"
                        name="password"
                        placeholder="Tu Contraseña"
                        class="rounded-lg border border-gray-400 p-2"
                    />
                    @error('password')
                        <p class="text-white font-bold bg-red-800 rounded-md
                        px-3 py-1 w-full mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="m-2 mb-3">
                    <input type="checkbox" class="ml-1.5" id="remember" name="remember">
                    <label for="remember" class="text-gray-500 font-bold">
                        Mantener la sesion activa
                    </label>
                </div>
                <div class="m-2 mb-3">
                    <input 
                        type="submit" 
                        value="Iniciar Sesión" 
                        class="text-white font-bold uppercase bg-blue-600 rounded-md
                        p-3 w-full cursor-pointer mt-2"
                    />
                </div>
            </form>
        </div>
    </div>

@endsection