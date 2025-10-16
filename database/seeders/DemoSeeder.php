<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\Producto;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    //Count es la cantidad de registros que queremos crear
    //Has es la relacion que queremos crear
    //Create es el metodo que crea los registros en la BD
    public function run(): void
    {
        //
        Categoria::factory()
        ->count(5)
        ->has(Producto::factory()->count(8))
        ->create();
    }
}
