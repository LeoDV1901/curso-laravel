<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\fakers;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        $this->call(PrimerSeeder::class);

    $this->call(ProductosTableFaker::class);
}

    
    
}
