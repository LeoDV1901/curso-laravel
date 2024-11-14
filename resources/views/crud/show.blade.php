@extends('layouts.app')

@section('title', 'Detalle del Producto')

@section('content')
<link rel="stylesheet" href="{{ asset('css/shpw.css') }}">

<div class="container product-details">
    <h1>Detalle del Producto</h1>

    <div class="product-card">
        <h2>{{ $producto->nombre }}</h2>

        <p class="description">{{ $producto->descripcion }}</p>

        <div class="price-quantity">
            <p><strong>Precio:</strong> ${{ number_format($producto->precio, 2) }}</p>
            <p><strong>Cantidad:</strong> {{ $producto->cantidad }}</p>
        </div>

        <div class="actions">
            <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-edit">Editar</a>

            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-delete">Eliminar</button>
            </form>

            <a href="{{ route('productos.index') }}" class="btn btn-back">Volver a la lista</a>
        </div>
    </div>
</div>
@endsection
