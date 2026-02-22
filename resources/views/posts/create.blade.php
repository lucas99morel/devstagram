@extends('layout.app')

@section('title')
    Crea una publicación
@endsection

@push('style')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:justify-center md:items-center md:gap-5">
        <div class="md:w-1/2">
            <form action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data"
                id="dropzone" 
                class="dropzone border-dashed border-2 w-full h-96
                rounded flex flex-col justify-center items-center"
            > 
                @csrf
            </form>

        </div>
        <form action="{{ route('posts.store') }}" method="POST" class="bg-white rounded-lg m-2 p-4 shadow-xl md:w-1/2" novalidate>
            @csrf
            <div class="flex flex-col m-2 mb-3">
                <label for="titulo" class="uppercase text-gray-700 font-bold pl-1">
                    Titulo
                </label>
                <input 
                    type="text" 
                    id="titulo"
                    name="titulo"
                    placeholder="Titulo de la publicacion"
                    value="{{ old("titulo") }}"
                    class="rounded-lg border border-gray-400 p-2"
                />
                @error('titulo')
                    <p class="text-white font-bold bg-red-800 rounded-md
                    px-3 py-1 w-full mt-1">{{ $message }}</p>
                @enderror
            </div> 
            <div class="flex flex-col m-2 mb-3">
                <label for="descripcion" class="uppercase text-gray-700 font-bold pl-1">
                    Descripción
                </label>
                <textarea
                    id="descripcion"
                    name="descripcion"
                    placeholder="Descripcion de la publicacion"   
                    class="rounded-lg border border-gray-400 p-2"
                >{{ old("descripcion") }}</textarea>
                @error('descripcion')
                    <p class="text-white font-bold bg-red-800 rounded-md
                    px-3 py-1 w-full mt-1">{{ $message }}</p>
                @enderror
            </div> 
            <div class="flex flex-col m-2 mb-3">
                <input 
                    type="hidden" 
                    name="imagen"
                    value="{{ old('imagen') }}"
                />
                @error('imagen')
                    <p class="text-white font-bold bg-red-800 rounded-md
                    px-3 py-1 w-full mt-1">{{ $message }}</p>
                @enderror
            </div> 
            <div class="m-2 mb-3">
                <input 
                    type="submit" 
                    value="Crear publicación" 
                    class="text-white font-bold uppercase bg-blue-600 rounded-md
                    p-3 w-full cursor-pointer mt-2"
                />
            </div>
        </form>
    </div>
@endsection