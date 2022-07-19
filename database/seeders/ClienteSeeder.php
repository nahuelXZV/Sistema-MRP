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
            'email' => "nahuelc@gmail.com",
            'direccion' => "Av. Las Flores",
        ]);
        Cliente::create([
            'nombre' => "Darwin Mamani",
            'telefono' => '45455115151',
            'email' => "darwinc@gmail.com",
            'direccion' => "Av. Las brisas",
        ]);
        Cliente::create([
            'nombre' => "Daniela Carrasco",
            'telefono' => '45455115151',
            'email' => "danielac@gmail.com",
            'direccion' => "Av. Paragua",
        ]);
        Cliente::create([
            'nombre' => "Diego Hurtado",
            'telefono' => '45455115151',
            'email' => "diegoc@gmail.com",
            'direccion' => "Av. Paraguay",
        ]);
        Cliente::create([
            'nombre' => "David Mamani",
            'telefono' => '45455115151',
            'email' => "davidc@gmail.com",
            'direccion' => "Calle Potosi",
        ]);
    }
}
