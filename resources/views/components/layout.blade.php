<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MI blog</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ route('posts.index') }}">Posts</a></li>
            @can('admin')
                <li><a href="{{ route('categories.index') }}">Categorias</a></li>
                <li><a href="">Tags</a></li>
            @endcan
        </ul>
    </nav>
    <hr>
    @auth
    <span>{{ auth()->user()->name }}</span>
    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form>
@else
    <a href="{{ route('login') }}">Iniciar sesión</a>
@endauth
    {{$slot}}
</body>
</html>