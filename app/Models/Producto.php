<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // Especificar el nombre de la tabla si es singular
    protected $table = 'producto';

    // Campos que se pueden rellenar en la base de datos
    protected $fillable = ['nombre', 'descripcion', 'precio', 'cantidad'];
}
