<x-layout>
    <div>
        <a href="{{ route('posts.index') }}">Volver</a> | 
        <a href="{{ route('posts.edit', $post) }}">Editar</a>
    </div>

    @if($post->image)
        <div>
            <img src="{{ $post->image }}" alt="{{ $post->title }}">
        </div>
    @endif

    <h1>{{ $post->title }}</h1>

    <p>Estado: {{ $post->is_published ? 'Publicado' : 'Borrador' }}</p>
    <p>Categoría: {{ $post->category->name }}</p>

    <div>
        Extract: {{ $post->extract }} 
    </div>
    <br>
    <div>
        Body: {{ $post->body }}
    </div>
    <br>
    <form action="{{ route('posts.destroy', $post) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
</x-layout>