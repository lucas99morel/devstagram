@extends('layout.app')

@section('title')
    Editar Perfil: {{ Auth::user()->username }}
@endsection

@section('contenido')
    <div class="flex flex-col items-center">
        <form action="{{ route('perfil.store') }}" method="POST" enctype="multipart/form-data" class="w-9/10 sm:w-7/20 bg-white rounded-lg m-2 p-2 shadow-xl flex flex-col items-center" novalidate>
            @csrf
            <div class="mb-2">
                <label class="cursor-pointer text-gray-600 hover:text-black uppercase font-bold" for="perfil">                    
                    <div class="my-2">
                        <img class="hover:brightness-75" src="{{ Auth::user()->imagen ? asset('img/perfiles/' . Auth::user()->imagen) : asset('img/usuario.svg') }}" alt="UsuarioImagen" id="preview">
                    </div>
                    <p class="text-center">
                        Cambiar Imagen de Perfil
                    </p>
                </label>
                <input 
                    type="file" 
                    id='perfil'
                    name="imagen"
                    accept=".png,.jpg,.jpeg"
                    value=""
                    hidden
                />
            </div>
            <div class="flex flex-col w-9/10 md:w-8/10 m-2">
                <label for="username" class="uppercase text-gray-700 font-bold pl-1">
                    Cambiar Username
                </label>
                <input 
                    type="text" 
                    id="username"
                    name="username"
                    placeholder="Tu nuevo username"
                    value="{{ old("username") ?? Auth::user()->username }}"
                    class="rounded-lg border border-gray-400 p-2 w-full"
                />
                @error('username')
                    <p class="text-white font-bold bg-red-800 rounded-md
                    px-3 py-1 w-full mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="m-2 w-9/10 md:w-8/10">
                <input 
                    type="submit" 
                    value="guardar cambios" 
                    class="text-white font-bold uppercase bg-blue-600 rounded-md
                    p-3 w-full cursor-pointer mt-2"
                />
            </div>
        </form>
    </div>
@endsection