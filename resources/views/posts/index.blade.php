<x-layout>
    @auth
        <a href="{{ route('posts.create') }}">Crear post</a>
    @endauth

    <h1>Vista index</h1>
    <ul>
        @foreach ($posts as $post)
            <li><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></li>
        @endforeach
    </ul>

    {{ $posts->links() }}
</x-layout>