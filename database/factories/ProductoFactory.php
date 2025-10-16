<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categoria;
use App\Models\Producto;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Producto::class;
    public function definition(): array
    {
        return [
            //Metodos de fabrical   
            //faker es una libreria que nos permite generar datos falsos
            //unique() es un metodo que nos permite generar datos unicos
            //words(2,true) es un metodo que nos permite generar 2 palabras y true
           'categoria_Id' => Categoria::factory(),
            'nombre' => $this->faker->words(3,true),
            'sku' => strtoupper($this->faker->unique()->bothify('SKU-####')),
            'precio' => $this->faker->randomFloat(2,1,500),
            'stock' => $this->faker->numberBetween(0,200),
            'activo' => $this->faker->boolean(90)
        ];
    }
}
