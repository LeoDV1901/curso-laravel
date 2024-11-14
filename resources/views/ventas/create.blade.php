{{-- resources/views/ventas/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Agregar Venta</h1>
    <form action="{{ route('ventas.store') }}" method="POST">
        @csrf
        <input type="text" name="producto" placeholder="Producto" required>
        <input type="number" name="cantidad" placeholder="Cantidad" required>
        <input type="text" name="precio" placeholder="Precio" required>
        <button type="submit">Guardar</button>
    </form>
@endsection
