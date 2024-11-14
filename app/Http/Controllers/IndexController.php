<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $productos = [
            (object) ['nombre' => 'Xbox Series X', 'descripcion' => 'La consola más potente', 'imagen_url' => asset('imagenes/xbox.jpg')],
            (object) ['nombre' => 'Nintendo Switch', 'descripcion' => 'Diversión en casa y fuera de ella', 'imagen_url' => asset('imagenes/nintendo.jpg')],
            (object) ['nombre' => 'PlayStation 5', 'descripcion' => 'La próxima generación de juegos', 'imagen_url' => asset('imagenes/play-station.webp')],
        ];

        return view('index', compact('productos'));
    }
}
