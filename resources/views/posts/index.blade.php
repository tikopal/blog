<x-layout>
    <a href="{{route('posts.create')}}">Crear post</a>
    <h1>Vista index</h1>

    <ul>
        @foreach ($posts as $post)
            <li><a href="{{route('posts.show', $post->id)}}">
                {{$post->title}}    
            </a></li>
        @endforeach
    </ul>
    {{$posts->links()}}
</x-layout>