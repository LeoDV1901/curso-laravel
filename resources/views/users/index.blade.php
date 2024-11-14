@extends('layouts.app')

@section('title', 'Detalle del Producto')
@section('content')
<div class="container">
    <link rel="stylesheet" href="{{ asset('css/paginacion.css') }}">
    <h1>Usuarios</h1>
    
    <a href="{{ route('users.create') }}" class="btn btn-primary create-product-button">Crear Usuario</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <ul>
        @foreach($users as $user)
            <li>
                <span class="user-name">{{ $user->name }}</span>
                <div class="button-group">
                    <a href="{{ route('users.edit', $user) }}" class="users-table--edit">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <!-- Formulario para eliminar usuario -->
                    <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="users-table--delete">
                            <i class="fas fa-trash"></i> Eliminar
                        </button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

   <!-- Paginación -->
   <div class="pagination">
        @if ($users->onFirstPage())
            <span class="disabled">Prev</span>
        @else
            <a href="{{ $users->previousPageUrl() }}" class="pagination-button">Prev</a>
        @endif

        @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
            @if ($page == $users->currentPage())
                <span class="active">{{ $page }}</span>
            @else
                <a href="{{ $url }}" class="pagination-button">{{ $page }}</a>
            @endif
        @endforeach

        @if ($users->hasMorePages())
            <a href="{{ $users->nextPageUrl() }}" class="pagination-button">Next</a>
        @else
            <span class="disabled">Next</span>
        @endif
    </div>
</div>

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
                text: "¡Este usuario será eliminado permanentemente!",
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
                customClass: {
                    popup: 'popup-style',  // Clase personalizada para el popup
                    confirmButton: 'btn-confirm',  // Clase personalizada para el botón de confirmación
                    cancelButton: 'btn-cancel'   // Clase personalizada para el botón de cancelación
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, enviar el formulario
                    form.submit();
                }
            });
        });
    });
</script>

<!-- Agregar estilos personalizados -->
<style>
    /* Estilos personalizados para mejorar la apariencia de la alerta */
    .swal2-popup {
        font-family: 'Arial', sans-serif;  /* Establecer la fuente del popup */
        border-radius: 8px;  /* Borde redondeado para la ventana */
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);  /* Sombra suave alrededor */
    }
    
    .swal2-title {
        font-size: 1.5rem;  /* Tamaño de fuente más grande para el título */
        font-weight: bold;  /* Negrita para el título */
        color: #333;  /* Color del texto del título */
    }

    .swal2-text {
        font-size: 1rem;  /* Tamaño de fuente más pequeño para el texto */
        color: #666;  /* Color gris para el texto */
    }

    .btn-confirm {
        background-color: #3085d6;  /* Color de fondo para el botón de confirmación */
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 1rem;
    }

    .btn-cancel {
        background-color: #f44336;  /* Color de fondo para el botón de cancelación */
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 1rem;
    }

    /* Centrar el botón de cancelación */
    .swal2-actions {
        display: flex;
        justify-content: space-between;
    }
</style>

@endsection
