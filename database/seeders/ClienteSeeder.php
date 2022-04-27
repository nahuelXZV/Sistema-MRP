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
            'nombre'=>"daniel",
            'telefono'=>"69086228",
            'direccion'=>"cambodromo"
        ]);
        Cliente::create([
            'nombre'=>"juan",
            'telefono'=>"69086228",
            'direccion'=>"cambodromo"
        ]);
        Cliente::create([
            'nombre'=>"pedro",
            'telefono'=>"69086228",
            'direccion'=>"cambodromo"
        ]);
    }
}
