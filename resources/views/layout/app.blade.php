<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @stack('style')
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
  <title>Devstagram - @yield('title')</title>
  @livewireStyles
</head>
<body class="bg-gray-300">
  <header class=" bg-white shadow">
    <div class="container mx-auto flex justify-between items-end md:items-center p-5">
      <a href="/" class="hover:text-gray-600">
        <h1 class="text-3xl font-black">DevStagram</h1>
      </a>
      <div class="flex gap-2">
        <form action="{{ route('search') }}" method="POST" class="flex gap-2 items-center">
          @csrf
          @error('usuario404')
            <p class="font-bold text-red-800" id="usuario404">{{ $message }}</p>
          @enderror
          <label for="search" class="flex gap-2 uppercase
          text-gray-600 font-bold border border-gray-300 rounded-sm 
          py-1 px-2
          hover:text-black hover:border-black cursor-pointer" id="labelSearch">            
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            <p>Buscar</p>
          </label>
          <input value="{{ old("username") }}" type="text" placeholder="Ingresa un username" class="py-1 px-2 border border-gray-300 text-gray-800" id="search" name="username" hidden required>
        </form>




        @auth
          <a 
            class="flex gap-2 uppercase
            text-gray-600 font-bold border border-gray-300 rounded-sm 
            py-1 px-2
            hover:text-black hover:border-black"
            href="{{ route('posts.create') }}">

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
            </svg>

            Crear
          </a>
          <a href="{{ route('posts.index', Auth::user()->username )}}" class="flex gap-1 uppercase
            text-gray-600 font-bold border border-gray-300 rounded-sm 
            py-1 px-2
            hover:text-black hover:border-black">
            

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
            <p>Mi perfil</p>
          </a>
          <form method="POST" action="{{ route('logout' )}}" class="flex">
            @csrf
            <button type="submit" class="border border-gray-300 py-1 px-2 hover:cursor-pointer uppercase text-gray-600 text-m font-bold hover:text-black">
              Cerrar Sesión
            </button>
          </form>
        @endauth
        
        @guest
          <nav class="flex gap-2 items-center mb:gap-4 uppercase text-gray-600 text-m font-bold">
            <a href="{{ route('login') }}" class="hover:text-black border border-gray-300 py-1 px-2">Login</a>
            <a href="{{ route('register') }}" class="hover:text-black border border-gray-300 py-1 px-2">Register</a>
          </nav>
        @endguest
      </div>
    </div>
  </header>

  <main class="container mx-auto">
    <h2 class="font-black text-center text-3xl my-5">
      @yield('title')
    </h2>
    @yield('contenido')
  </main>

  <footer class="text-center p-5 text-gray-500 font-bold uppercase">
    Devstagram - Todos los derechos reservados {{ now()->year }}
  </footer>

  @livewireScripts
</body>
</html>               