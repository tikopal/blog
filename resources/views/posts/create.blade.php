<x-layout>
    <h1>Crear post</h1>
    <form action="{{route('posts.store')}}" method="POST">
        @csrf

        <div style="margin-bottom: 10px">
            <label for="category_id">Categoria</label><br>
            <select name="category_id" id="category_id">
                <option value="" selected disabled></option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}" @selected(old('category_id') == $category->id)>
                        {{$category->name}}
                    </option>
                @endforeach
            </select>
            <br>
            @error('category_id')
                <span style="color: red">
                    {{$message}}
                </span>
            @enderror
        </div>

        <div style="margin-bottom: 10px">
            <label for="title">Title</label><br>
            <input type="text" name="title" id="title" value="{{old('title')}}">
            <br>
            @error('title')
                <span style="color: red">
                    {{$message}}
                </span>
            @enderror
        </div>

        <div>
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" value="{{old('slug')}}">
            <br>
            @error('slug')
                <span style="color:red" >{{$message}}</span>
            @enderror
        </div><br>

        <div>
            <label for="extract">Extract</label>
            <input type="text" name="extract" id="extract" value="{{old('extract')}}">
            <br>
            @error('extract')
                <span style="color:red" >{{$message}}</span>
            @enderror
        </div><br>

        <div style="margin-bottom: 10px">
            <label for="body">Body</label><br>
            <textarea name="body" id="body" cols="40" rows="7">{{old('body')}}</textarea>
            <br>
            @error('body')
                <span style="color: red">
                    {{$message}}
                </span>
            @enderror
        </div>

        <div>
            <label for="slug">Image Path</label>
            <input type="text" name="image" id="image" value="{{old('image')}}">
            <br>
            @error('image')
                <span style="color:red" >{{$message}}</span>
            @enderror
        </div><br>

        <div>
                <label for="is_published">Is published
                    <input type="checkbox" name="is_published" id="is_published" value="1" @checked(old('active')==1)>
                    Active
                </label>
        </div>

        <button type="submit">Create</button>

    </form>
</x-layout>




