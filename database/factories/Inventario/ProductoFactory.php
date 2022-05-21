<?php

namespace Database\Factories\Inventario;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductoFactory extends Factory
{

    public function definition()
    {
        return [
            'nombre' => $this->faker->sentence(),
            'descripcion' => $this->faker->sentence(),
            'color' => $this->faker->randomElement(['negro', 'gris', 'blanco']),
            'tamaño' => $this->faker->randomElement(['150x100', '200x150', '50x50']),
            'estado' => $this->faker->randomElement(['activado', 'desactivado']),
            'peso' => $this->faker->randomElement(['80', '150', '50', '25']),
            'especificacion' => $this->faker->sentence(),
            'costo_produccion' => $this->faker->randomElement(['250', '300', '100', '1000']),
            'cantidad' => $this->faker->randomElement(['10', '20', '30', '40', '50']),
        ];
    }
}
