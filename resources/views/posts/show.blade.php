@extends('layout.app')

@section('title')
    {{ $post->titulo }}    
@endsection

@section('contenido')
    <div class="container md:flex justify-center gap-5">
        <div class="md:w-1/3  mx-2.5">
            <div class="">
                <img src="{{ asset('uploads/' . $post->imagen) }}" alt="">
            </div>
            <div class="my-2.5 ml-1">
                <div class="flex gap-1 items-center">
                    @auth
                        <livewire:like-post :post="$post" />
                        {{-- @if(!$post->checkLike(Auth::user()))
                            <form action="{{ route('posts.likes.store',$post) }}" method="POST">
                                @csrf
                                <button type="submit" class="cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                    </svg>
                                </button>          
                            </form>
                        @else
                            <form action="{{ route('posts.likes.destroy',$post) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                    </svg>
                                </button>
                            </form>
                        @endif --}}
                    @endauth
                    
                    {{-- <p class="text-lg">
                        <span class="font-bold">{{ $post->likes->count() }}</span> 
                        <span>Likes</span>
                    </p> --}}
                </div>
                <p class="text-lg">
                    <span class="font-bold">{{ $post->user->username }}:</span>
                    <span>{{ $post->descripcion }}</span>
                </p>
                <p class="text-gray-600">{{ $post->created_at->diffForHumans() }}</p>
                @auth
                    @if ($post->user->id == Auth::user()->id)
                        <form action="{{ route('posts.destroy',$post) }}" method="POST" class="mt-1.5">
                            @method('DELETE')
                            @csrf
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg> --}}
    
                            <input 
                                type="submit"
                                value="Eliminar Post"
                                class="text-white font-bold uppercase bg-red-700 hover:bg-red-800 rounded-md
                                px-2.5 py-1 cursor-pointer"
                            />
                        </form>                
                    @endif
                @endauth
            </div>
        </div>
        <div class="flex flex-col md:gap-10 h-full justify-center md:w-1/3 bg-white rounded-lg shadow-xl  mx-2.5">
            <div class="my-4 ">
                @if ($post->comentarios->count())
                    <p class="uppercase text-gray-700 font-bold px-3">Comentarios</p>
                    <div class=" overflow-y-scroll max-h-78">
                        @foreach ($post->comentarios as $comentario)
                            <div class="bg-gray-100 mb-1 mx-2.5 rounded-md py-3 pl-2">
                                <p>
                                    <a href="{{ route('posts.index',$comentario->user->username) }}">
                                        <span class="font-bold">{{ $comentario->user->username }}: </span>
                                    </a>
                                    <span>{{ $comentario->comentario }}</span>
                                </p>
                                <p class="text-gray-600 text-sm">
                                    {{ $comentario->created_at->diffForHumans() }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="flex flex-col items-center mt-5  text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                        </svg>

                        <p class="text-center font-bold">Aun no hay comentarios...</p>
                    </div>
                @endif
            </div>

            @auth
            <form class="p-2" action="{{ route('comentarios.store',[$user,$post]) }}" method="POST">
                @csrf

                @if(session('success'))
                    <div class="m-2 mb-3 bg-green-600 text-white font-bold text-center rounded-md py-1.5 uppercase">
                        {{ session('success') }}!
                    </div>
                @endif

                <div class="flex flex-col m-2 mb-3">
                    <label for="comentario" class="uppercase text-gray-700 font-bold pl-1">
                        Agregar un comentario
                    </label>
                    <textarea
                        id="comentario"
                        name="comentario"
                        placeholder="Comenta algo aqui..."   
                        class="rounded-lg border border-gray-400 p-2"
                    >{{ old("comentario") }}</textarea>
                    @error('comentario')
                        <p class="text-white font-bold bg-red-800 rounded-md
                        px-3 py-1 w-full mt-1">{{ $message }}</p>
                    @enderror
                </div> 
                <div class="m-2 mb-3">
                    <input 
                        type="submit" 
                        value="Comentar" 
                        class="text-white font-bold uppercase bg-blue-600 rounded-md
                        p-2 w-full cursor-pointer mt-2"
                    />
                </div>
            </form>
            @endauth            
        </div>
    </div>
@endsection

