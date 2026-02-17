<x-layout>
    <h1>Editar category: {{ $category->name }}</h1>
        <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 10px">
            <label for="name">Name</label><br>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}">
            @error('name') <br><span style="color:red">{{ $message }}</span> @enderror
        </div>


        <button type="submit">Actualizar categoria</button>
    </form>
</x-layout>