<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="register.css">
    <title>REGISTER</title>

</head>
<body>

<form action="{{ route('store.data') }}" method="POST">
    @csrf <!-- Protección contra CSRF -->
    
    <h2>Registro</h2>

    <label for="name">Nombre:</label>
    <input type="text" name="name" id="name" placeholder="Ingresa tu nombre" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" placeholder="Ingresa tu email" required>

    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password" placeholder="Crea una contraseña" required>

    <button type="submit">Enviar</button>
</form>

</body>
</html>
