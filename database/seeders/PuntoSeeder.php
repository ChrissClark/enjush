<?php

namespace Database\Seeders;
use App\Models\Punto;

use Illuminate\Database\Seeder;

class PuntoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Punto::create(['nombre' => 'Punto 1', 'latitud' => 40.712776, 'longitud' => -74.005974]);
        Punto::create(['nombre' => 'Punto 2', 'latitud' => 34.052235, 'longitud' => -118.243683]);
        Punto::create(['nombre' => 'Punto 3', 'latitud' => 37.774929, 'longitud' => -122.419418]);
    }
}
