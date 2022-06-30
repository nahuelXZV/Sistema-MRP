<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompraDistribucion\Pedido;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pedido::create([
            'cliente_id' => 1,
            'distribuidor_id' => null,
            'direccion' => "1er. Anillo Plaza 24 de Septiembre",
            'descripcion' => "Pedido de prueba.",
            'estado' => "Pendiente",
            'fecha' => "04/06/2022",
            'hora' => "14:54:37"
        ]);

        Pedido::create([
            'cliente_id' => 2,
            'distribuidor_id' => null,
            'direccion' => "Barrio 12 de agosto C/27 de mayo",
            'descripcion' => "Pedido realizado con demora.",
            'estado' => "Finalizado",
            'fecha' => "12/06/2022",
            'hora' => "14:50:41"
        ]);
        Pedido::create([
            'cliente_id' => 3,
            'distribuidor_id' => null,
            'direccion' => "Barrio 23 de Octubre C/Paraguay",
            'descripcion' => "Primer pedido realizado.",
            'estado' => "Listo para el envio",
            'fecha' => "31/05/2022",
            'hora' => "14:07:36"
        ]);
    }
}
