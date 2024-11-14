@extends('layouts.app')

@section('title', 'Lista de Productos')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/paginacion.css') }}">

    <!-- Cargar el CSS de SweetAlert2 -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.min.css" rel="stylesheet">

    <div class="container">
        <h1>Lista de Productos</h1>
        <a href="{{ route('productos.create') }}" class="create-product-button">Crear nuevo producto</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <ul>
            @foreach ($productos as $producto)
                <li>
                    <span>{{ $producto->nombre }} - ${{ number_format($producto->precio, 2) }}</span>
                    <div class="button-group">
                        <a href="{{ route('productos.edit', $producto->id) }}" class="users-table--edit">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <!-- Formulario para eliminar producto -->
                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="users-table--delete">
                                <i class="fas fa-trash-alt"></i> Eliminar
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>

        <div class="pagination">
            @if ($productos->onFirstPage())
                <span class="disabled">Prev</span>
            @else
                <a href="{{ $productos->previousPageUrl() }}" class="pagination-button">Prev</a>
            @endif

            @foreach ($productos->getUrlRange(1, $productos->lastPage()) as $page => $url)
                @if ($page == $productos->currentPage())
                    <span class="active">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="pagination-button">{{ $page }}</a>
                @endif
            @endforeach

            @if ($productos->hasMorePages())
                <a href="{{ $productos->nextPageUrl() }}" class="pagination-button">Next</a>
            @else
                <span class="disabled">Next</span>
            @endif
        </div>
    </div>

    <!-- Cargar el JS de SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.min.js"></script>

    <script>
        // Selecciona todos los formularios de eliminación
        document.querySelectorAll('.delete-form').forEach(function(form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();  // Previene el envío del formulario inmediato

                // Muestra la alerta de confirmación
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡Esta acción no se puede deshacer!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Si el usuario confirma, se envía el formulario para eliminar el producto
                        form.submit();
                    }
                });
            });
        });
    </script>

@endsection
