<?php

namespace Database\Seeders;

use App\Models\Configuracion\SistemaUnidad;
use App\Models\Empresa;
use App\Models\Inventario\Producto;
use App\Models\User;
use Database\Seeders\Inventario\ProductoSeeder;
use Illuminate\Database\Seeder;
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
        //Debe ejecutar los seeders el comando de abajo
        //php artisan migrate:refresh --seed
        $this->call([
            UserSeeder::class,
            SistemaUnidadSeeder::class,
            ClienteSeeder::class,
            // ProductoSeeder::class
        ]);
        
        //crea 20 registros de productos
        Producto::factory(20)->create();

        Empresa::create([
            'nombre' => 'Empresa 1',
            'licencia' => '123456789',
            'direccion' => 'Calle 1',
            'telefono' => '123456789',
            'email' => 'empresa@gmail.com',
            'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit platea arcu nam, magna pharetra et dictum leo scelerisque est gravida felis habitant semper, curae facilisi cras enim viverra penatibus vitae imperdiet blandit. Porta fusce nascetur tellus et suspendisse facilisis lobortis sociosqu porttitor id eleifend dui mattis, facilisi faucibus risus lectus senectus laoreet non tempus litora in egestas ornare. Ligula condimentum ridiculus orci et aliquam elementum torquent nisi vestibulum senectus, ad nec lectus placerat dignissim id sociosqu rhoncus.
            Lacus cum potenti at eros ligula faucibus, urna mollis sollicitudin malesuada velit dis, eu tempus primis fusce accumsan. Habitant potenti nostra tempor risus eget cubilia arcu metus etiam, magna bibendum eleifend primis posuere platea viverra condimentum donec, malesuada phasellus nam mollis quisque aptent justo laoreet. Luctus habitasse molestie montes fusce orci praesent nostra ultricies parturient condimentum netus, sodales sollicitudin integer mattis nullam a arcu felis vitae cubilia.',
            'passwd_bitacora' => '123456789',
            'ciudad' => 'Santa cruz',
        ]);
    }
}
