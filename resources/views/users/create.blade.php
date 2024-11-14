@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/user_create.css') }}">
<div class="container">
    <h1>Crear Usuario</h1>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" name="password" required>
        </div>

        <div class="text-center">
            <button type="submit" class="create-product-button">
                Crear
            </button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary mt-2">
                Cancelar
            </a>
        </div>
    </form>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
</div>
@endsection
