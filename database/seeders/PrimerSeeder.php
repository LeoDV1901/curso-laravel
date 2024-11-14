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
                'nombre' => 'Dato de seeder 1',
                'precio' => 180.00,
                'descripcion' => 'Pruba de dato de seeder',
                
            ],
            [
                'nombre' => 'Dato de seeder 2',
                'precio' => 250.00,
                'descripcion' => 'Pruba de dato de seeder 2',
                
            ],
            
        ]);
    });
}

    
        
}
