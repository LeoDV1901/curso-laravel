@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">

<!-- Cargar el CSS de SweetAlert2 -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.min.css" rel="stylesheet">

<div class="container">
    <h1>Editar Producto</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('productos.update', $producto->id) }}" method="POST" id="edit-product-form">
        @csrf
        @method('PUT')
        
        <div class="form-group mb-3">
            <label for="nombre" class="form-label">Nombre del Producto</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', $producto->nombre) }}" required>
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" id="descripcion" rows="3" required>{{ old('descripcion', $producto->descripcion) }}</textarea>
            @error('descripcion')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" id="precio" name="precio" class="form-control" value="{{ old('precio', $producto->precio) }}" step="0.01" required>
            @error('precio')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" id="cantidad" name="cantidad" class="form-control" value="{{ old('cantidad', $producto->cantidad) }}" required>
            @error('cantidad')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <button type="submit" class="btn btn-success" id="submit-btn">Actualizar Producto</button>
            <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>

<!-- Cargar el JS de SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.min.js"></script>

<script>
    // Agregar evento de confirmación antes de enviar el formulario de actualización
    document.getElementById('edit-product-form').addEventListener('submit', function(e) {
        e.preventDefault(); // Evita que el formulario se envíe de inmediato

        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡Los cambios no se podrán deshacer!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, actualizar',
            cancelButtonText: 'Cancelar',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Si el usuario confirma, enviar el formulario
                document.getElementById('edit-product-form').submit();
            }
        });
    });
</script>

@endsection
