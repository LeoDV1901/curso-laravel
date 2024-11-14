<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Imagen y Peso</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #34495e;
            color: white;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .container {
            margin-top: 50px;
        }
        .input-container {
            margin: 20px;
        }
        .rotate-img {
            width: 600px;
            height: 600px;
            border: 5px solid #fff;
            border-radius: 10px;
            animation: rotate 5s infinite linear;
        }
        @keyframes rotate {
            100% {
                transform: rotate(360deg);
            }
        }
        button {
            background-color: #e74c3c;
            border: none;
            padding: 10px 20px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }
        button:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Ingresa tu peso en kg:</h1>
    <div class="input-container">
        <input type="number" id="peso" placeholder="Tu peso en kg" style="padding: 10px; font-size: 18px;">
    </div>
    <button onclick="mostrarImagen()">Enviar y Mostrar Imagen</button>

    <div id="imagen-container" style="display:none;">
            
        <img id="imagen" class="rotate-img" src="obesa.jpg" alt="Imagen" />
    </div>
</div>

<audio id="audio" src="cancion_saturada.mp3"></audio>

<script>
    function mostrarImagen() {
        let peso = document.getElementById('peso').value;
        if (peso) {
            alert('Peso ingresado: ' + peso + ' kg');

            // Mostrar imagen
            document.getElementById('imagen-container').style.display = 'block';

            // Reproducir música
            let audio = document.getElementById('audio');
            audio.play();
        } else {
            alert('Por favor, ingresa tu peso.');
        }
    }
</script>

</body>
</html>
