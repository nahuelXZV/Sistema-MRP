<?php

namespace Database\Seeders;

use App\Models\Configuracion\SistemaUnidad;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\InventarioSeeder;
// use Database\Seeders\configuracion\SistemaUnidadSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(SistemaUnidadSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(InventarioSeeder::class);

    }
}
