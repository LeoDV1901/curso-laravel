<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Iniciar Sesión</title>
</head>
<body>
    <div>
        <h1>Iniciar Sesión</h1>

        @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <label for="email">Correo electrónico:</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label for="password">Contraseña:</label>
                <input type="password" name="password" required>
            </div>

            <!-- Campo para el código de 2FA, visible solo si se necesita -->
            @if(session('login_user'))
                <div class="two-factor-code active">
                    <label for="two_factor_code">Código de autenticación:</label>
                    <input type="text" name="two_factor_code" placeholder="Ingrese el código" required>
                </div>
            @endif

            <div>
                <button type="submit">Iniciar Sesión</button>
            </div>
        </form>
    </div>
</body>
</html>
