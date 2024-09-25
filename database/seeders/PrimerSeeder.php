<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PrimerSeeder extends Seeder
{
   
    public function run()
{
    DB::transaction(function () {
        DB::table('productos')->insert([
            [
                'nombre' => 'Producto 1',
                'precio' => 180.00,
                'descripcion' => 'Carro',
                
            ],
            
        ]);
    });
}

    
        
}
