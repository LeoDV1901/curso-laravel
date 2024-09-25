<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory; // Importar la clase Factory de fakerphp/faker

class ProductosTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create(); // Crear una instancia de Faker

        foreach (range(1, 50) as $index) {
            DB::table('productos')->insert([
                'nombre' => $faker->word, // Generar un nombre falso (una palabra)
                'precio' => $faker->randomFloat(2, 1, 100), // Generar un precio (valor flotante entre 1 y 100 con 2 decimales)
                'descripcion' => $faker->sentence(10), // Generar una descripción (10 palabras)
               
            ]);
        }
    }
}
