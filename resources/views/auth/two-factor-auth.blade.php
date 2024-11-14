<!DOCTYPE html>
<html>
<head>
    <title>Verificar 2FA</title>
</head>
<body>
    <h1>Verificación de Dos Factores</h1>
    <form action="{{ url('/two-factor-auth/verify') }}" method="POST">
        @csrf
        <input type="text" name="two_factor_code" placeholder="Código de autenticación" required>
        <button type="submit">Verificar</button>
    </form>
</body>
</html>
