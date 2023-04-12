<div>
    @if($posts->count())
        <div class="grid md:grid-cols-2 lg:grid-col-3 xl:grid-cols-4 gap-6">
            @foreach($posts as $post)
                <div >
                    <a href="{{ route('posts.show', [ 'user' => $post->user, 'post' => $post]) }}">
                    <img src="{{ asset('uploads/'.$post->imagen)}}" alt="Imagen usuario">
                    </a>
                </div>
            @endforeach
        </div>

        <div class="my-10">
        {{ $posts->links() }}
        </div> 

    @else
        <p class="text-center">Sigue alguien para encotrnar post</p>
    @endif
</div>


{{-- Contenido de esta página
@if($posts->count())
<div class="grid md:grid-cols-2 lg:grid-col-3 xl:grid-cols-4 gap-6">
 @foreach($posts as $post)
     <div >
         <a href="{{ route('posts.show', [ 'user' => $post->user, 'post' => $post]) }}">
             <img src="{{ asset('uploads/'.$post->imagen)}}" alt="Imagen usuario">
         </a>
         {{-- <img src="{{ asset('img/usuario.svg')}}" alt="Imagen usuario"> --}}
     {{-- </div>
 @endforeach
</div> --}}

{{-- <div class="my-10">
 {{ $posts->links() }}
</div>  --}}

{{-- @else
     <p class="text-center">Sigue alguien para encotrnar post</p>
@endif --}} --}}

{{-- @forelse ( $posts as $post )
 <h1>{{ $post->titulo}} </h1>
@empty
    <p>No hay ppost</p>
@endforelse --}}