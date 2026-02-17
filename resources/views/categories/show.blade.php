<x-layout>
    <div>
        <a href="{{ route('categories.index') }}">Volver</a> | 
        <a href="{{ route('categories.edit', $category) }}">Editar</a>
    </div>

    <h1>{{ $category->name }}</h1>

    <p>Categoría: {{ $category->name }}</p>

    <form action="{{ route('categories.destroy', $category) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
</x-layout>