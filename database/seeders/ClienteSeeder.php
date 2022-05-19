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
            'direccion' => "nahuelc@gmail.com"
        ]);
        Cliente::create([
            'nombre' => "Darwin Mamani",
            'telefono' => '45455115151',
            'direccion' => "darwinc@gmail.com"
        ]);
        Cliente::create([
            'nombre' => "Daniela Carrasco",
            'telefono' => '45455115151',
            'direccion' => "danielac@gmail.com"
        ]);
        Cliente::create([
            'nombre' => "Diego Hurtado",
            'telefono' => '45455115151',
            'direccion' => "diegoc@gmail.com"
        ]);
        Cliente::create([
            'nombre' => "David Mamani",
            'telefono' => '45455115151',
            'direccion' => "davidc@gmail.com"
        ]);
    }
}
