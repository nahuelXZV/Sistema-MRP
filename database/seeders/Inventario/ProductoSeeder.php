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
        /*Producto::create([
            'nombre' => Str::random(10),
            'descripcion' => Str::random(10),
            'color' => Str::random(10),
            'tamaño' => Str::random(10),
            'estado' => Str::random(10),
            'peso' => Str::random(10),
            'especificacion' => Str::random(10),
            'costo_produccion' => Str::random(10),
            'cantidad' => Str::random(10),
        ]);*/

        Producto::create([
            'nombre' => 'Mesa',
            'descripcion' => 'Est eget ut eu magna fames hac felis sodales parturient pharetra, hendrerit auctor vel vitae litora pellentesque taciti sagittis conubia, placerat fusce per tristique lectus risus aliquam vestibulum class. Dictum curae torquent platea eros urna in justo ',
            'color' => 'Marrón',
            'tamaño' => '25x14x15x15',
            'estado' => 'Stock',
            'peso' => 20,
            'especificacion' => 'Est eget ut eu magna fames hac felis sodales parturient pharetra, hendrerit auctor vel vitae litora pellentesque taciti sagittis conubia, placerat fusce per tristique lectus risus aliquam vestibulum class. Dictum curae torquent platea eros urna in justo ',
            'costo_produccion' => 200,
            'cantidad' => 0,
        ]);
        Producto::create([
            'nombre' => 'Silla',
            'descripcion' => 'Est eget ut eu magna fames hac felis sodales parturient pharetra, hendrerit auctor vel vitae litora pellentesque taciti sagittis conubia, placerat fusce per tristique lectus risus aliquam vestibulum class. Dictum curae torquent platea eros urna in justo ',
            'color' => 'Negro',
            'tamaño' => '12x25x14x51',
            'estado' => 'Stock',
            'peso' => 20,
            'especificacion' => 'Est eget ut eu magna fames hac felis sodales parturient pharetra, hendrerit auctor vel vitae litora pellentesque taciti sagittis conubia, placerat fusce per tristique lectus risus aliquam vestibulum class. Dictum curae torquent platea eros urna in justo ',
            'costo_produccion' => 80,
            'cantidad' => 18,
        ]);
        Producto::create([
            'nombre' => 'Armario',
            'descripcion' => 'Est eget ut eu magna fames hac felis sodales parturient pharetra, hendrerit auctor vel vitae litora pellentesque taciti sagittis conubia, placerat fusce per tristique lectus risus aliquam vestibulum class. Dictum curae torquent platea eros urna in justo ',
            'color' => 'Blanco',
            'tamaño' => '21x25x14x45',
            'estado' => 'Stock',
            'peso' => 54,
            'especificacion' => 'Est eget ut eu magna fames hac felis sodales parturient pharetra, hendrerit auctor vel vitae litora pellentesque taciti sagittis conubia, placerat fusce per tristique lectus risus aliquam vestibulum class. Dictum curae torquent platea eros urna in justo ',
            'costo_produccion' => 150,
            'cantidad' => 20,
        ]);


    }
}
