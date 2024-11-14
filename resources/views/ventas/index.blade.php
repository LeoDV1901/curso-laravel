@extends('layouts.app')

@section('content')
    <h1>Ventas</h1>
    <a href="{{ route('ventas.create') }}" class="btn btn-primary">Agregar Venta</a>
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ventas as $venta)
                <tr>
                    <td>{{ $venta->producto }}</td>
                    <td>{{ $venta->cantidad }}</td>
                    <td>{{ $venta->precio }}</td>
                    <td>
                        <a href="{{ route('ventas.edit', $venta) }}" class="btn btn-warning">Editar</a>
                        <!-- Formulario de eliminación con SweetAlert2 -->
                        <form action="{{ route('ventas.destroy', $venta) }}" method="POST" style="display:inline;" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Cargar el JS de SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.min.js"></script>

    <script>
        // Seleccionar todos los formularios de eliminación
        document.querySelectorAll('.delete-form').forEach(function(form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();  // Prevenir el envío inmediato del formulario

                // Mostrar alerta de confirmación
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡Esta venta será eliminada permanentemente!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar',
                    reverseButtons: true,
                    // Asegurarse de que SweetAlert2 esté centrado
                    position: 'center',  // Centra la alerta en la pantalla
                    width: '32rem',  // Tamaño personalizado para la ventana emergente
                    padding: '1.5em',
                    background: '#fff', // Fondo blanco
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Si el usuario confirma, enviar el formulario
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
