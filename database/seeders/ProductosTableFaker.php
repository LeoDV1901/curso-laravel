<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class ProductosTableFaker extends Seeder
{
    public function run()
    {
        // Crear instancia de Faker en español
        $faker = Factory::create('es_ES'); 

        $nombresProductos = [
            'Teléfono', 'Computadora', 'Teclado', 'Ratón', 'Monitor', 
            'Impresora', 'Tablet', 'Cámara', 'Auriculares', 'Cargador'
        ];

        foreach (range(1, 10) as $index) {
            DB::table('productos')->insert([
                'nombre' => $faker->randomElement($nombresProductos), 
                'precio' => $faker->randomFloat(2, 1, 100),
                'descripcion' => $faker->realText(50), 
            ]);
        }
    }
}
