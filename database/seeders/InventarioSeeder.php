<?php

namespace Database\Seeders;

use App\Models\Configuracion\CategoriaMateriaPrima;
use App\Models\Inventario\MateriaPrima;
use Illuminate\Database\Seeder;

class InventarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     CategoriaMateriaPrima::create([
        'nombre' => 'Madera',
        'descripcion' => 'Material de una cierta elasticidad que se encuentra en el troncode los árboles.',
     ]);
     CategoriaMateriaPrima::create([
        'nombre' => 'Metal',
        'descripcion' => 'Material sólido en condiciones ambientales normales, suelen ser opacos y brillantes.',
     ]);


     MateriaPrima::create([
        'nombre' => 'Aglomerado',
        'tipo' => 'Madera',
        'peso' => 'Tablero estándar 35 kg.',
        'tamaño' => '244×122 cm.',
        'color' => 'Negro',
        'descripcion' => 'Material obtenido por agregación de sustancias minerales, unidos por un aglomerante capaz de dar cohesión alconjunto.',
        'idCategoriaMP' => 1,
     ]);

     MateriaPrima::create([
        'nombre' => 'BANACK',
        'tipo' => 'Madera',
        'peso' => '3.01 kg.',
        'tamaño' => '8 - 14 Pies de largo, 5 - 12 Pulgadas de ancho y 1, 1½ Pulgadas de grosor.',
        'color' => 'Café Rosado',
        'descripcion' => 'Madera tropical , de densidad media.',
        'idCategoriaMP' => 1,
     ]);
    }
}
