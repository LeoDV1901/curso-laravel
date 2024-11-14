@extends('layouts.app')

@section('title', 'Crear Producto')

@section('content')
<link rel="stylesheet" href="{{ asset('css/create.css') }}">

<div class="container">
    <h1>Crear Nuevo Producto</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        
        <div class="form-group mb-3">
            <label for="nombre" class="form-label">Nombre del Producto</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" id="descripcion" rows="3" required>{{ old('descripcion') }}</textarea>
            @error('descripcion')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" id="precio" name="precio" class="form-control" value="{{ old('precio') }}" step="0.01" required>
            @error('precio')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" id="cantidad" name="cantidad" class="form-control" value="{{ old('cantidad') }}" required>
            @error('cantidad')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <button type="submit" class="btn btn-success">Crear Producto</button>
            <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
