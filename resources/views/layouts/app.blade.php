<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    
    <!-- Llamada al archivo CSS -->
    <link rel="stylesheet" href="{{ asset('css/crud.css') }}">
    
    <!-- Llamada a Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-1We9iQz32W6w2WKe0Pe+dHgLT9J5+P8zqjWOSptS5Gmb4Ff5umUSdf1aDAAvEEp0PTB5dMPcA8lqH5m56SgbbA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Mi Aplicación')</title>

    
    <link rel="icon" type="image/png" href="{{ asset('images/icon.png') }}"

    <!-- Otros estilos y scripts -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
