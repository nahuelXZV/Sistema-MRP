<?php

namespace App\Exports;

use App\Models\Proveedor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProveedorExport implements FromCollection, WithHeadings
{
    protected $query;
    protected $encabezado;

    public function headings(): array
    {
        return $this->encabezado;
    }

    public function __construct($datos, $encabezado)
    {
        $this->encabezado = $encabezado;
        //$this->query = $invoices;
        if ($datos['filtro'] != null && $datos['buscar'] != null && $datos['order'] != null && $datos['orderBy'] != null && $datos['cantidad'] != null) {

            if ($datos['cantidad'] == 'all') {
                $this->query = DB::table($datos['modelo'])->where($datos['filtro'], 'like', '%' . $datos['buscar'] . '%')
                    ->select($datos['atributos'])
                    ->orderBy($datos['orderBy'], $datos['order'])
                    ->get();
            } else {
                $this->query = DB::table($datos['modelo'])->where($datos['filtro'], 'like', '%' . $datos['buscar'] . '%')
                    ->select($datos['atributos'])
                    ->orderBy($datos['orderBy'], $datos['order'])
                    ->paginate($datos['cantidad']);
            }
        } else if ($datos['order'] != null && $datos['orderBy'] != null && $datos['cantidad'] != null) {
            if ($datos['cantidad'] == 'all') {
                $this->query = DB::table($datos['modelo'])
                    ->select($datos['atributos'])
                    ->orderBy($datos['orderBy'], $datos['order'])
                    ->get();
            } else {
                $$this->query = DB::table($datos['modelo'])
                    ->orderBy($datos['orderBy'], $datos['order'])
                    ->paginate($datos['cantidad']);
            }
        } else {
            $this->query = DB::table($datos['modelo'])->select($datos['atributos'])->get();
        }
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->query;
    }
}
