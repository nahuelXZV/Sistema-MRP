<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Nahuel Zalazar',
            'email' => 'nahuel@gmail.com',
            'password' => bcrypt('123456789')
        ])->assignRole('Administrador');
        User::create([
            'name' => 'Darwin Mamani ',
            'email' => 'darwin@gmail.com',
            'password' => bcrypt('00000000')
        ])->assignRole('Administrador');
        User::create([
            'name' => 'Daniela Carrasco',
            'email' => 'daniela@gmail.com',
            'password' => bcrypt('123456789')
        ])->assignRole('Administrador');
        User::create([
            'name' => 'Diego Hurtado',
            'email' => 'diego@gmail.com',
            'password' => bcrypt('123456789')
        ])->assignRole('Administrador');
        User::create([
            'name' => 'David Mamani',
            'email' => 'david@gmail.com',
            'password' => bcrypt('123456789')
        ])->assignRole('Administrador');
        User::create([
            'name' => 'Administrador',
            'email' => 'administrador@gmail.com',
            'password' => bcrypt('123456789')
        ])->assignRole('Administrador');

        //Usuario Trabajador
        User::create([
            'name' => 'Gabriel Lopez',
            'email' => 'gabriel@gmail.com',
            'password' => bcrypt('123456789')
        ])->assignRole('Trabajador');
    }
}
