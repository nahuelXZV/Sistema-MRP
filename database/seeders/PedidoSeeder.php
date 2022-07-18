<?php

namespace Database\Seeders;

use App\Models\CategoriaProducto;
use App\Models\CompraDistribucion\Distribuidor;
use App\Models\CompraDistribucion\NotaCompra;
use Illuminate\Database\Seeder;
use App\Models\CompraDistribucion\Pedido;
use App\Models\CompraDistribucion\PedidoCancelado;
use App\Models\CompraDistribucion\Proveedor;
use App\Models\DetalleCompra;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoriaProducto::create([
            'nombre'=>'Mueble',
            'descripcion'=>'Artefacto para el hogar'
        ]);
        CategoriaProducto::create([
            'nombre'=>'Sillon',
            'descripcion'=>'Artefacto para el hogar'
        ]);

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


        //Proveedores
        Proveedor::create([
            'nombre_empresa'=>'EMBOL',
            'telefono'=> '3450809',
            'direccion'=>'Av. Uruguay calle 5',
            'email'=>'embol@gmail.com',
            'encargado'=>'Roger Gutierrez'
        ]);
        Proveedor::create([
            'nombre_empresa'=>'MADERAC',
            'telefono'=> '3450789',
            'direccion'=>'Av. Brasil calle Beni',
            'email'=>'maderac@gmail.com',
            'encargado'=>'Limber Hurtado'
        ]);

        //Distribuidores
        Distribuidor::create([
            'nombre'=>'Mercado A',
            'direccion'=>'Av. Pirai calle oeste',
            'telefono'=>'3798468',
            'email'=>'maria@gmail.com',
            'tipo'=>'Mercado',
            'medio_transporte'=>'Camion'
        ]);
        Distribuidor::create([
            'nombre'=>'Mercado B',
            'direccion'=>'Av. Pirai calle sur',
            'telefono'=>'3798468',
            'email'=>'carlos@gmail.com',
            'tipo'=>'Mercado',
            'medio_transporte'=>'Camion'
        ]);

        //Detalle compra
        NotaCompra::create([
            'proveedor_id'=>1,
            'costo_total'=>0,  
            'hora'=>"14:07:36",
            'fecha'=>"31/05/2022",
        ]);
    }
}
