<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tienda;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tienda>
 */
class TiendaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'codigo' => $this->faker->unique()->randomNumber(5),
            'nombre' => $this->faker->name,
            'descripcion' => $this->faker->text,
            'categoria' => $this->faker->randomElement(['calzado','ropa','joyeria']),
            'precio' => $this->faker->randomFloat(2, 0, 1000),
            'stock' => $this->faker->randomNumber(2),
        ];
    }
}
