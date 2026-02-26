<x-layout>
    <div>
        <a href="{{ route('posts.index') }}">Volver</a> 
        @can('update', $post)
            <a href="{{ route('posts.edit', $post) }}">Editar</a>
        @endcan
    </div>

    @if($post->image_path)
        <div>
            <img src="{{ asset($post->image_path) }}" alt="{{ $post->title }}" style="max-width: 200px;">
        </div>
    @endif

    <h1>{{ $post->title }}</h1>
    <p>Categoría: {{ $post->category->name }}</p>
    <p>{{ $post->body }}</p>

    @can('delete', $post)
        <form action="{{ route('posts.destroy', $post) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('¿Eliminar todo el post?')">Eliminar Post</button>
        </form>
    @endcan

    <hr>

    <h5>Deja un comentario:</h5>
    <form action="{{ route('comments.store', $post) }}" method="POST">
        @csrf
        <textarea name="body" placeholder="Escribe tu comentario aquí..." required></textarea>
        <br>
        <button type="submit">Publicar Comentario</button>
    </form>

    <h4>Comentarios ({{ $post->comments->count() }})</h4>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <ul>
        @foreach ($post->comments as $comment)
            <li style="margin-bottom: 10px;">
                {{ $comment->body }}
                @can('admin')
                    <form action="{{ route('comments.destroy', $comment) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color:red; border:none; background:none; cursor:pointer;" onclick="return confirm('¿Borrar comentario?')">
                            [Eliminar]
                        </button>
                    </form>
                @endcan
            </li>
        @endforeach
    </ul>
    <hr>
</x-layout>