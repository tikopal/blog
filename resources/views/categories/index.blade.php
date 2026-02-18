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
    @if (session('error'))
        <div style="background: #ffcccc; color: #a00; padding: 15px; margin-bottom: 20px; border: 1px solid #a00;">
            {{ session('error') }}
        </div>
    @endif 
    {{$categories->links()}}
</x-layout>