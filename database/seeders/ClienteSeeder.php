<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create([
            'nombre' => "Nahuel Zalazar",
            'telefono' => '45455115151',
            'direccion' => "Av. Las Flores",
        ]);
        Cliente::create([
            'nombre' => "Darwin Mamani",
            'telefono' => '45455115151',
            'direccion' => "Av. Las brisas",
        ]);
        Cliente::create([
            'nombre' => "Daniela Carrasco",
            'telefono' => '45455115151',
            'direccion' => "Av. Paragua",
        ]);
        Cliente::create([
            'nombre' => "Diego Hurtado",
            'telefono' => '45455115151',
            'direccion' => "Av. Paraguay",
        ]);
        Cliente::create([
            'nombre' => "David Mamani",
            'telefono' => '45455115151',
            'direccion' => "Calle Potosi",
        ]);
    }
}
