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
            'nombre'=>"Nahuel Zalazar",
            'direccion'=>"nahuel@gmail.com"
        ]);
        Cliente::create([
            'nombre'=>"Darwin Mamani",     
            'direccion'=>"darwin@gmail.com"
        ]);
        Cliente::create([
            'nombre'=>"Daniela Carrasco",
            'direccion'=>"daniela@gmail.com"
        ]);
        Cliente::create([
            'nombre'=>"Diego Hurtado",
            'direccion'=>"diego@gmail.com"
        ]);
        Cliente::create([
            'nombre'=>"David Mamani",
            'direccion'=>"david@gmail.com"
            
        ]);
    }
}
