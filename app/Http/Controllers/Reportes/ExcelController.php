<?php

namespace App\Http\Controllers\Reportes;

use App\Exports\ProductosExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{

    public function excel()
    {
        return Excel::download(new ProductosExport, 'productos.xlsx');
    }
}
