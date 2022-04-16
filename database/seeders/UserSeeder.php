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
        ]);
        User::create([
            'name' => 'Darwin Mamani ',
            'email' => 'darwin@gmail.com',
            'password' => bcrypt('123456789')
        ]);
        User::create([
            'name' => 'Daniela Carraco',
            'email' => 'daniel@gmail.com',
            'password' => bcrypt('123456789')
        ]);
        User::create([
            'name' => 'Diego Hurtado',
            'email' => 'diego@gmail.com',
            'password' => bcrypt('123456789')
        ]);
        User::create([
            'name' => 'David Mamani',
            'email' => 'david@gmail.com',
            'password' => bcrypt('123456789')
        ]);
    }
}
