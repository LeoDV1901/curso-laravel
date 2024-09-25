<?php

use App\Models\Producto; // Asegúrate de que tienes el modelo Producto

Route::get('/productos', function () {
    $productos = Producto::all();
    return view('productos.index', compact('productos'));
});
