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
            'nombre' => 'Mueble',
            'descripcion' => 'Artefacto para el hogar'
        ]);
        CategoriaProducto::create([
            'nombre' => 'Sillon',
            'descripcion' => 'Artefacto para el hogar'
        ]);

        //Proveedores
        Proveedor::create([
            'nombre_empresa' => 'EMBOL',
            'telefono' => '3450809',
            'direccion' => 'Av. Uruguay calle 5',
            'email' => 'embol@gmail.com',
            'encargado' => 'Roger Gutierrez'
        ]);
        Proveedor::create([
            'nombre_empresa' => 'MADERAC',
            'telefono' => '3450789',
            'direccion' => 'Av. Brasil calle Beni',
            'email' => 'maderac@gmail.com',
            'encargado' => 'Limber Hurtado'
        ]);

        //Distribuidores
        Distribuidor::create([
            'nombre' => 'Mercado A',
            'direccion' => 'Av. Pirai calle oeste',
            'telefono' => '3798468',
            'email' => 'maria@gmail.com',
            'tipo' => 'Mercado',
            'medio_transporte' => 'Camion'
        ]);
        Distribuidor::create([
            'nombre' => 'Mercado B',
            'direccion' => 'Av. Pirai calle sur',
            'telefono' => '3798468',
            'email' => 'carlos@gmail.com',
            'tipo' => 'Mercado',
            'medio_transporte' => 'Camion'
        ]);
    }
}
