<?php

namespace App\Exports;

use App\Models\Inventario\Producto as InventarioProducto;
use App\Models\Producto;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductosExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return InventarioProducto::all();
    }
}
