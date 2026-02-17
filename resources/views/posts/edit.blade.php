<x-layout>
    <h1>Editar post: {{ $post->title }}</h1>
        <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 10px">
            <label for="category_id">Categoria</label><br>
            <select name="category_id" id="category_id">
                <option value="" selected disabled>Seleccione una categoría</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id', $post->category_id) == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <br><span style="color: red">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 10px">
            <label for="title">Title</label><br>
            <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}">
            @error('title') <br><span style="color: red">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 10px">
            <label for="slug">Slug</label><br>
            <input type="text" name="slug" id="slug" value="{{ old('slug', $post->slug) }}">
            @error('slug') <br><span style="color:red">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 10px">
            <label for="extract">Extract</label><br>
            <input type="text" name="extract" id="extract" value="{{ old('extract', $post->extract) }}">
            @error('extract') <br><span style="color:red">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 10px">
            <label for="body">Body</label><br>
            <textarea name="body" id="body" cols="40" rows="7">{{ old('body', $post->body) }}</textarea>
            @error('body') 
                <br><span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 10px">
            <label for="image">Image Path</label><br>
            <input type="text" name="image" id="image" value="{{ old('image', $post->image) }}">
            @error('image') <br><span style="color:red">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 10px">
            <label for="is_published">
                <input type="checkbox" name="is_published" id="is_published" value="1" 
                    @checked(old('is_published', $post->is_published))>
                Is published / Active
            </label>
        </div>

        <button type="submit">Actualizar Post</button>
    </form>
</x-layout>