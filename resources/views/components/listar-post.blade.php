<div>
    @if($posts->count())
        <div class="mt-7.5 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 mx-5 gap-2.5">
            @foreach ($posts as $post)
            <a href="{{ route('posts.show',[$post->user,$post]) }}">
                <img src="{{ asset('uploads/' . $post->imagen) }}" alt="{{$post->titulo . ": " . $post->descripcion}}">
            </a>
            @endforeach
        </div>
    @else
        {{ $slot }}
    @endif
</div>