<x-layout>
    <a href="{{route('categories.create')}}">Crear categoria</a>
    <h1>Vista categorias</h1>

    <ul>
        @foreach ($categories as $category)
            <li><a href="{{route('categories.show', $category)}}">
                {{$category->name}}    
            </a></li>
        @endforeach
    </ul>
    {{$categories->links()}}
</x-layout>