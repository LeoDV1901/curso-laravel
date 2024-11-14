<?php
// app/Models/Venta.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    // Define la tabla si no sigue la convención plural
    protected $table = 'ventas';

    // Los atributos que se pueden asignar masivamente
    protected $fillable = [
        'producto',
        'cantidad',
        'precio',
    ];

}
