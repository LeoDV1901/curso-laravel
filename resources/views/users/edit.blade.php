@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/user_edit.css') }}">

<!-- Cargar el CSS de SweetAlert2 -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.min.css" rel="stylesheet">

<div class="container">
    <h1 class="text-center">Editar Usuario</h1>

    <form action="{{ route('users.update', $user) }}" method="POST" class="form-container" id="edit-user-form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group">
            <label for="password">Contraseña (dejar vacío si no desea cambiarla)</label>
            <input type="password" class="form-control" name="password">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success" id="submit-btn">
                <i class="fas fa-user-edit"></i> Actualizar
            </button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary mt-2">
                <i class="fas fa-arrow-left"></i> Cancelar
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

<!-- Cargar el JS de SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.min.js"></script>

<script>
    // Evento de confirmación antes de enviar el formulario de edición
    document.getElementById('edit-user-form').addEventListener('submit', function(e) {
        e.preventDefault(); // Previene el envío del formulario inmediato

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
                document.getElementById('edit-user-form').submit();
            }
        });
    });
</script>

@endsection
