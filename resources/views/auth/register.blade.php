@extends('layout.app')

@section('title')
    Registrate en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:items-center md:gap-5">
        <div class="md:w-2/5 mx-4 md:mx-0">
            <img class="border rounded-2xl md:rounded-none" src="{{ asset('img/registrar.jpg') }}" alt="RegistrarImg">
        </div>
        <div class="md:w-4/12">
            <form action="{{ route('register') }}" method="POST" 
            class="bg-white rounded-lg m-2 p-4 shadow-xl" novalidate>
                @csrf
                <div class="flex flex-col m-2 mb-3">
                    <label for="name" class="uppercase text-gray-700 font-bold pl-1">
                        Nombre
                    </label>
                    <input 
                        type="text" 
                        id="name"
                        name="name"
                        placeholder="Tu Nombre"
                        value="{{ old("name") }}"
                        class="rounded-lg border border-gray-400 p-2 w-full"
                    />
                    @error('name')
                        <p class="text-white font-bold bg-red-800 rounded-md
                        px-3 py-1 w-full mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col m-2 mb-3">
                    <label for="username" class="uppercase text-gray-700 font-bold pl-1">
                        Username
                    </label>
                    <input 
                        type="text" 
                        id="username"
                        name="username"
                        placeholder="Tu Nombre de Usuario"
                        value="{{ old("username") }}"
                        class="rounded-lg border border-gray-400 p-2"
                    />
                    @error('username')
                        <p class="text-white font-bold bg-red-800 rounded-md
                        px-3 py-1 w-full mt-1">{{ $message }}</p>
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
                <div class="flex flex-col m-2 mb-3">
                    <label for="password_confirmation" class="uppercase text-gray-700 font-bold pl-1">
                        Repetir Contraseña
                    </label>
                    <input 
                        type="password" 
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Repite tu Contraseña"
                        class="rounded-lg border border-gray-400 p-2"
                    />
                    {{-- @error('password_confirmation')
                        <p class="text-white font-bold bg-red-800 rounded-md
                        px-3 py-1 w-full mt-1">{{ $message }}</p>
                    @enderror --}}
                </div>
                <div class="m-2 mb-3">
                    <input 
                        type="submit" 
                        value="Registrar Cuenta" 
                        class="text-white font-bold uppercase bg-blue-600 rounded-md
                        p-3 w-full cursor-pointer mt-2"
                    />
                </div>
            </form>
        </div>
    </div>
@endsection