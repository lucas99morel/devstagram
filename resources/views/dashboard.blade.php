@extends('layout.app')

@section('title')
    Perfil de {{ $user->username }} 
@endsection

@section('contenido')
    
    <div class="container">
        <div class="flex gap-8 flex-col items-center md:flex-row md:justify-center">
            <div class="w-8/12 md:w-1/5">
                <img src="{{ $user->imagen ? asset('img/perfiles/' . $user->imagen) : asset('img/usuario.svg') }}" alt="UsuarioImagen">
            </div>
            <div class="w-65 md:w-1/5 text-center md:text-left">
                <div class="flex items-center justify-center md:justify-start gap-2 text-gray-700">
                    <p class="font-bold text-2xl mb-2.5">{{ $user->username }}</p>
                    
                    @auth
                        @if($user->id === Auth::user()->id)
                            <a href="{{ route('perfil.index') }}" class="hover:text-black">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                                    <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                                </svg>
                            </a>
                        @endif
                    @endauth
                </div>

                <div class="flex justify-between">
                    <p class="flex flex-col">
                        <span class="font-bold">{{ $user->followers->count() }}</span> 
                        <span class="w-20">@choice('Seguidor|Seguidores',$user->followers->count())</span>
                    </p>
                    <p class="flex flex-col">
                        <span class="font-bold">{{ $user->following->count() }}</span> 
                        <span class="w-20">@choice('Seguido|Seguidos',$user->following->count())</span>
                    </p>
                    <p class="flex flex-col">
                        <span class="font-bold">{{ $user->posts->count() }}</span> 
                        <span class="w-20">Posts</span>
                    </p>
                </div>

                @auth
                    @if(Auth::user()->id != $user->id )
                        @if(!Auth::user()->follows($user))
                            <form 
                                action="{{ route('users.follow',$user->username) }}"
                                method="POST"
                            >
                                @csrf
                                <input 
                                    type="submit" 
                                    value="Seguir"
                                    class="text-white font-bold uppercase bg-blue-600 hover:bg-blue-800 rounded-md
                                        px-2.5 py-0.5 cursor-pointer my-2"
                                >
                            </form>                            
                        @else
                            <form 
                                action="{{ route('users.unfollow',$user->username) }}"
                                method="POST"
                            >
                                @method('DELETE')
                                @csrf
                                <input 
                                    type="submit" 
                                    value="Dejar de seguir"
                                    class="text-white font-bold uppercase bg-red-600 hover:bg-red-800 rounded-md
                                        px-2.5 py-0.5 cursor-pointer my-2"
                                >
                            </form>                                            
                        @endif
                    @endif
                @endauth
            </div>
        </div>
    </div>

    <section>
        <h2 class="font-black text-center text-3xl my-5">
            Publicaciones
        </h2>

        <x-listar-post :posts="$posts">
            <div class="text-center text-gray-700 flex flex-col items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-14">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                </svg>
    
                <p class=" font-bold text-xl mb-2.5">No hay posts</p>                
            </div>
        </x-listar-post>
    </section>
@endsection

