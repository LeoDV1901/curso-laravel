<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!-- Vinculamos Bootstrap para el diseño y el carrusel -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #333;
        }
        .navbar a {
            color: white !important;
        }
        .carousel-item img {
            height: 400px;
            object-fit: cover;
            width: 100%;
        }
        .carousel {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Tienda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Xbox</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Nintendo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">PlayStation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/form">Registrarse</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Carrusel de imágenes -->
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="imagenes/imagen6.jpg" class="d-block w-100" alt="Imagen 1">
            </div>
            <div class="carousel-item">
                <img src="imagenes/imagen4.jpg" class="d-block w-100" alt="Imagen 2">
            </div>
            <div class="carousel-item">
                <img src="imagenes/imagen5.jpg" class="d-block w-100" alt="Imagen 3">
            </div>
            <div class="carousel-item">
                <img src="/imagenes/nintendo.jpg" class="d-block w-100" alt="Imagen 4">
            </div>
            <div class="carousel-item">
                <img src="/imagenes/xbox.jpg" class="d-block w-100" alt="Imagen 5">
            </div>
            <div class="carousel-item">
                <img src="/imagenes/play-station.webp" class="d-block w-100" alt="Imagen 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Vinculamos los scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
