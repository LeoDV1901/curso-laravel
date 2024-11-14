{{-- resources/views/ventas/edit.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Editar Venta</h1>
    <form action="{{ route('ventas.update', $venta) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="producto" value="{{ $venta->producto }}" required>
        <input type="number" name="cantidad" value="{{ $venta->cantidad }}" required>
        <input type="text" name="precio" value="{{ $venta->precio }}" required>
        <button type="submit">Actualizar</button>
    </form>
@endsection
