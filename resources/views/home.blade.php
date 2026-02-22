@extends('layout.app')

@section('title')
  Pagina Principal
@endsection

@section('contenido')

    <x-listar-post :posts="$posts" >
        <div class="mt-8 flex flex-col items-center text-lg font-black mb-2.5 uppercase text-gray-700">            
            <p>No hay posts por ver</p>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-20 mt-3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
            </svg>
            <p class="mt-3 text-xl">Sigue a alguien para ver publicaciones nuevas</p>
        </div>
    </x-listar-post>
    
@endsection