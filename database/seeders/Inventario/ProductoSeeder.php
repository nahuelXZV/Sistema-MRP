<?php

namespace Database\Seeders\Inventario;

use App\Models\Inventario\Producto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
            'nombre' => Str::random(10),
            'descripcion' => Str::random(10),
            'color' => Str::random(10),
            'tamaño' => Str::random(10),
            'estado' => Str::random(10),
            'peso' => Str::random(10),
            'especificacion' => Str::random(10),
            'costo_produccion' => Str::random(10),
            'cantidad' => Str::random(10),            
        ]);
    }
}
