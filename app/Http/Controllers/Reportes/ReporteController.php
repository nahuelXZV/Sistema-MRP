<?php

namespace App\Http\Controllers\Reportes;

use App\Exports\ClientesExport;
use App\Exports\DistribuidorExport;
use App\Exports\MaquinariaExport;
use App\Exports\MateriaPrimaExport;
use App\Exports\ProductosExport;
use App\Exports\ProveedorExport;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use App\Models\Cliente;
use App\Models\CompraDistribucion\Distribuidor;
use App\Models\CompraDistribucion\Proveedor;
use App\Models\Empresa;
use App\Models\Inventario\MateriaPrima;
use App\Models\Inventario\Producto;
use App\Models\Produccion\Maquinaria;
use App\Models\User;
use Illuminate\Http\Request;
use Fpdf\Fpdf;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ReporteController extends Controller
{
    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }

    public function index()
    {
        return view('reportes.index');
    }

    public function validar(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'modelo' => 'required',
            'extension' => 'required',
        ]);
        Bitacora::Bitacora('R', 'Reporte', '');
        switch ($request->extension) {
            case 'pdf':
                return $this->pdf2($request);
                break;
            default:
                return $this->otros($request);
                break;
        }
    }

    //PDF----------------------------------------------------------------------------
    function Header($empresa)
    {
        // Logo
        $this->fpdf->Image('Logo.png', 12, 10, 33);
        // Arial bold 15
        $this->fpdf->SetFont('Arial', 'I', 9);
        // Movernos a la derecha
        $this->fpdf->setX(140);
        // Título
        $this->fpdf->Cell(60, 10, utf8_decode($empresa['nombre'] . ' #: ' . $empresa['direccion']), 0, 0, 'R');
        $this->fpdf->Ln(5);
        $this->fpdf->setX(140);
        $this->fpdf->Cell(60, 10, utf8_decode('Ciudad: ' . $empresa['ciudad']), 0, 0, 'R');
        $this->fpdf->Ln(5);
        $this->fpdf->setX(140);
        $this->fpdf->Cell(60, 10, utf8_decode('Teléfono: ' . $empresa['telefono']), 0, 0, 'R');
        $this->fpdf->Ln(5);
        $this->fpdf->setX(140);
        $this->fpdf->Cell(60, 10, utf8_decode('Correo Electrónico: ' . $empresa['email']), 0, 0, 'R');
        $this->fpdf->Ln(5);
        $this->fpdf->setX(140);
        $this->fpdf->Cell(60, 10, utf8_decode('Creado: ' . now()), 0, 0, 'R');
        // Salto de línea
        $this->fpdf->Ln(15);
    }

    public function pdf($datos)
    {
        $empresa = Empresa::first();
        $this->fpdf->AddPage();
        $this->fpdf->SetMargins(10, 10, 10);
        $this->fpdf->SetAutoPageBreak(true, 20);
        $this->Header($empresa);

        $this->fpdf->SetFont('Arial', 'B', 13);
        $this->fpdf->Cell(190, 10, utf8_decode($datos['nombre']), 0, 0, 'C');
        $this->fpdf->Ln(15);

        //Encabezado de la tabla
        if ($datos['atributos'] == null) {
            $datos['atributos']  = $this->DefaultModel($datos['modelo']);
        }
        $separacion = 190 / count($datos['atributos']);
        $this->fpdf->SetFont('Arial', 'B', 9);
        $this->fpdf->SetFillColor(238, 238, 238);
        $this->fpdf->SetDrawColor(238, 238, 238);
        $this->fpdf->SetTextColor(0, 0, 0);
        foreach ($datos['atributos'] as $atributo) {
            $this->fpdf->Cell($separacion, 10, utf8_decode(mb_strtoupper($atributo, "UTF-8")), 1, 0, 'L', 1);
        }
        $this->fpdf->Ln(10);

        //Consulta
        if ($datos['filtro'] != null && $datos['buscar'] != null && $datos['order'] != null && $datos['orderBy'] != null && $datos['cantidad'] != null) {

            if ($datos['cantidad'] == 'all') {
                $query = DB::table($datos['modelo'])->where($datos['filtro'], 'like', '%' . $datos['buscar'] . '%')
                    ->orderBy($datos['orderBy'], $datos['order'])
                    ->get();
            } else {
                $query = DB::table($datos['modelo'])->where($datos['filtro'], 'like', '%' . $datos['buscar'] . '%')
                    ->orderBy($datos['orderBy'], $datos['order'])
                    ->paginate($datos['cantidad']);
            }
        } else if ($datos['order'] != null && $datos['orderBy'] != null && $datos['cantidad'] != null) {
            if ($datos['cantidad'] == 'all') {
                $query = DB::table($datos['modelo'])
                    ->orderBy($datos['orderBy'], $datos['order'])
                    ->get();
            } else {
                $query = DB::table($datos['modelo'])
                    ->orderBy($datos['orderBy'], $datos['order'])
                    ->paginate($datos['cantidad']);
            }
        } else {
            $query = DB::table($datos['modelo'])->get();
        }
        // Datos de la tabla
        $this->fpdf->SetFont('Arial', 'I', 9);
        $this->fpdf->SetDrawColor(230, 230, 230);

        foreach ($query as $key => $tupla) {
            foreach ($datos['atributos'] as $atributo) {
                $this->fpdf->Cell($separacion, 8, utf8_decode($tupla->$atributo), 'B', 0, 'L');
                //$this->fpdf->MultiCell($separacion, 8, utf8_decode($tupla->$atributo), 0, 'L', 0);
            }
            $this->fpdf->Ln(10);
        }
        $this->fpdf->Output("I", $datos['nombre'] . ".pdf", true);
    }

    public function pdf2($datos)
    {
        $empresa = Empresa::first();
        $this->fpdf->AddPage();
        $this->fpdf->SetMargins(10, 10, 10);
        $this->fpdf->SetAutoPageBreak(true, 20);
        $this->Header($empresa);

        $this->fpdf->SetFont('Arial', 'B', 13);
        $this->fpdf->Cell(190, 10, utf8_decode($datos['nombre']), 0, 0, 'C');
        $this->fpdf->Ln(15);

        //Encabezado de la tabla
        if ($datos['atributos'] == null) {
            $datos['atributos']  = $this->DefaultModel($datos['modelo']);
        }

        $this->fpdf->SetFont('Arial', 'B', 9);
        $this->fpdf->SetFillColor(238, 238, 238);
        $this->fpdf->SetDrawColor(238, 238, 238);
        $this->fpdf->SetTextColor(0, 0, 0);
        //Consulta
        if ($datos['filtro'] != null && $datos['buscar'] != null && $datos['order'] != null && $datos['orderBy'] != null && $datos['cantidad'] != null) {

            if ($datos['cantidad'] == 'all') {
                $query = DB::table($datos['modelo'])->where($datos['filtro'], 'like', '%' . $datos['buscar'] . '%')
                    ->orderBy($datos['orderBy'], $datos['order'])
                    ->get();
            } else {
                $query = DB::table($datos['modelo'])->where($datos['filtro'], 'like', '%' . $datos['buscar'] . '%')
                    ->orderBy($datos['orderBy'], $datos['order'])
                    ->paginate($datos['cantidad']);
            }
        } else if ($datos['order'] != null && $datos['orderBy'] != null && $datos['cantidad'] != null) {
            if ($datos['cantidad'] == 'all') {
                $query = DB::table($datos['modelo'])
                    ->orderBy($datos['orderBy'], $datos['order'])
                    ->get();
            } else {
                $query = DB::table($datos['modelo'])
                    ->orderBy($datos['orderBy'], $datos['order'])
                    ->paginate($datos['cantidad']);
            }
        } else if ($datos['filtro'] != null && $datos['buscar'] != null) {
            $query = DB::table($datos['modelo'])->where($datos['filtro'], 'like', '%' . $datos['buscar'] . '%')
                ->orderBy('id', 'asc')
                ->get();
        } else {
            $query = DB::table($datos['modelo'])->get();
        }

        //header del contenido
        $this->fpdf->SetFont('Arial', 'B', 9);
        $this->fpdf->SetFillColor(238, 238, 238);
        $this->fpdf->SetDrawColor(238, 238, 238);
        $this->fpdf->SetTextColor(0, 0, 0);
        $this->fpdf->Cell(190, 10, utf8_decode(mb_strtoupper('Contenido:', "UTF-8")), 1, 0, 'L', 1);
        $this->fpdf->Ln(15);

        // Datos de la tabla
        $header = $this->HeaderModel($datos['modelo'], $datos['atributos']);
        foreach ($query as $tupla) {
            foreach ($datos['atributos'] as $key => $atributo) {
                $this->fpdf->SetFont('Arial', 'B', 9);
                $this->fpdf->Cell(40, 10, utf8_decode(mb_strtoupper($header[$key], "UTF-8") . " :"), 0, 0, 'L', 0);
                $this->fpdf->SetFont('Arial', 'I', 9);
                $this->fpdf->MultiCell(150, 10, utf8_decode($tupla->$atributo), 0, 'L', 0);
            }
            $this->fpdf->SetDrawColor(130, 139, 139);
            $this->fpdf->Line(10, $this->fpdf->GetY() + 5, 200, $this->fpdf->GetY() + 5);
            $this->fpdf->Ln(10);
        }
        $this->fpdf->Output("I", $datos['nombre'] . ".pdf", true);
    }

    public function DefaultModel($modelo)
    {
        switch ($modelo) {
            case 'users':
                return User::$default;
                break;
            case 'clientes':
                return Cliente::$default;
                break;
            case 'proveedors':
                return Proveedor::$default;
                break;
            case 'productos':
                return Producto::$default;
                break;
            case 'materia_primas':
                return MateriaPrima::$default;
                break;
            case 'maquinarias':
                return Maquinaria::$default;
                break;
            case 'distribuidors':
                return Distribuidor::$default;
                break;
            default:
                # code...
                break;
        }
    }
    public function InterfaceModel($modelo)
    {
        switch ($modelo) {
            case 'users':
                return User::$interface;
                break;
            case 'clientes':
                return Cliente::$interface;
                break;
            case 'proveedors':
                return Proveedor::$interface;
                break;
            case 'productos':
                return Producto::$interface;
                break;
            case 'materia_primas':
                return MateriaPrima::$interface;
                break;
            case 'maquinarias':
                return Maquinaria::$interface;
                break;
            case 'distribuidors':
                return Distribuidor::$interface;
                break;
            default:
                # code...
                break;
        }
    }
    public function AtributteModel($modelo)
    {
        switch ($modelo) {
            case 'users':
                return User::$atributos;
                break;
            case 'clientes':
                return Cliente::$atributos;
                break;
            case 'proveedors':
                return Proveedor::$atributos;
                break;
            case 'productos':
                return Producto::$atributos;
                break;
            case 'materia_primas':
                return MateriaPrima::$atributos;
                break;
            case 'maquinarias':
                return Maquinaria::$atributos;
                break;
            case 'distribuidors':
                return Distribuidor::$atributos;
                break;
            default:
                # code...
                break;
        }
    }
    public function HeaderModel($modelo, $atributo)
    {
        $default = $this->AtributteModel($modelo);
        $interface = $this->InterfaceModel($modelo);
        foreach ($atributo as $key => $value) {
            //verifica si el value esta en default y devuelve la posicion del array
            $posicion = array_search($value, $default);
            $array[$key] = $interface[$posicion];
        }
        return $array;
    }

    //Otros----------------------------------------------------------------------------
    public function otros($datos)
    {
        if ($datos['atributos'] == null) {
            $datos['atributos']  = $this->DefaultModel($datos['modelo']);
        }
        $interface = $this->HeaderModel($datos['modelo'], $datos['atributos']);
        switch ($datos['modelo']) {
            case 'users':
                return Excel::download(new UsersExport($datos, $interface), $datos['nombre'] . '.' . $datos['extension']);
                break;
            case 'clientes':
                return Excel::download(new ClientesExport($datos, $interface), $datos['nombre'] . '.' . $datos['extension']);
                break;
            case 'proveedors':
                return Excel::download(new ProveedorExport($datos, $interface), $datos['nombre'] . '.' . $datos['extension']);
                break;
            case 'productos':
                return Excel::download(new ProductosExport($datos, $interface), $datos['nombre'] . '.' . $datos['extension']);
                break;
            case 'materia_primas':
                return Excel::download(new MateriaPrimaExport($datos, $interface), $datos['nombre'] . '.' . $datos['extension']);
                break;
            case 'maquinarias':
                return Excel::download(new MaquinariaExport($datos, $interface), $datos['nombre'] . '.' . $datos['extension']);
                break;
            case 'distribuidors':
                return Excel::download(new DistribuidorExport($datos, $interface), $datos['nombre'] . '.' . $datos['extension']);
                break;
            default:
                # code...
                break;
        }
    }
}
