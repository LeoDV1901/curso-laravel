@extends('layouts.app')

@section('content')
    <h1>Editar Post</h1>
    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Título:</label>
            <input type="text" name="title" id="title" value="{{ $post->title }}">
        </div>
        <div>
            <label for="body">Contenido:</label>
            <textarea name="body" id="body">{{ $post->body }}</textarea>
        </div>
        <button type="submit">Actualizar</button>
    </form>
    <a href="{{ route('posts.index') }}">Volver a la lista</a>
@endsection
