<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="{{ asset('css/acceso.css') }}">
</head>
<body>
    <div class="header">
        <!-- Agregar evento para cerrar sesión -->
        <button class="logout-btn" onclick="cerrarSesion()">Cerrar sesión</button>
    </div>

    <div class="container">
        <div class="icon" onclick="window.location.href='/users'">
            <img src="imagenes/users.png" alt="Users">
            <span>Users</span>
        </div>
        <div class="icon" onclick="window.location.href='/productos'">
            <img src="imagenes/productos.png" alt="Productos">
            <span>Productos</span>
        </div>
        <div class="icon" onclick="window.location.href='/ventas'">
            <img src="imagenes/ventas.png" alt="Ventas">
            <span>Ventas</span>
        </div>
    </div>

    <script>
        
        function cerrarSesion() {
            
            window.location.href = '/';
        }
    </script>
</body>
</html>
