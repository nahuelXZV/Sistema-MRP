<?php

namespace App\Http\Controllers\Reportes;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use App\Models\Empresa;
use App\Models\Produccion\EstadoPedido;
use App\Models\Produccion\Mps;
use App\Models\Produccion\Problema;
use Illuminate\Http\Request;
use Fpdf\Fpdf;

class ManufacturaController extends Controller
{
    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }

    public function rp()
    {
        Bitacora::Bitacora('R', 'Reporte', '');
        $empresa = Empresa::first();
        $this->fpdf->AddPage();
        $this->fpdf->SetMargins(10, 10, 10);
        $this->fpdf->SetAutoPageBreak(true, 20);
        $this->Header($empresa);

        $this->fpdf->SetFont('Arial', 'B', 13);
        $this->fpdf->Cell(190, 10, utf8_decode("Reporte de problemas de producción"), 0, 0, 'C');
        $this->fpdf->Ln(15);

        $this->fpdf->SetFont('Arial', 'B', 9);
        $this->fpdf->SetFillColor(238, 238, 238);
        $this->fpdf->SetDrawColor(238, 238, 238);
        $this->fpdf->SetTextColor(0, 0, 0);

        $query = Problema::all();

        //header del contenido
        $this->fpdf->SetFont('Arial', 'B', 9);
        $this->fpdf->SetFillColor(238, 238, 238);
        $this->fpdf->SetDrawColor(238, 238, 238);
        $this->fpdf->SetTextColor(0, 0, 0);
        $this->fpdf->Cell(190, 10, utf8_decode(mb_strtoupper('Contenido:', "UTF-8")), 1, 0, 'L', 1);
        $this->fpdf->Ln(15);

        // Datos de la tabla
        foreach ($query as $key => $tupla) {
            $this->tupla("Codigo", $key);
            $this->tupla("Codigo de manufactura", $tupla->manufactura_id);
            $this->tupla("Nombre del procesos", $tupla->proceso->nombre);
            $this->tupla("Tipo de problema", $tupla->tipo_problema);
            $this->tupla("Fecha", $tupla->fecha);
            $this->tupla("Estado", $tupla->estado);
            $this->tupla("Descripción", $tupla->descripcion);
            $this->fpdf->SetDrawColor(130, 139, 139);
            $this->fpdf->Line(10, $this->fpdf->GetY() + 5, 200, $this->fpdf->GetY() + 5);
            $this->fpdf->Ln(10);
        }
        $this->fpdf->Output("I", "Reporte de problemas de producción" . ".pdf", true);
    }

    public function rmps($id)
    {
        $mps = Mps::find($id);

        Bitacora::Bitacora('R', 'Reporte', '');
        $empresa = Empresa::first();
        $this->fpdf->AddPage();
        $this->fpdf->SetMargins(10, 10, 10);
        $this->fpdf->SetAutoPageBreak(true, 20);
        $this->Header($empresa);

        $this->fpdf->SetFont('Arial', 'B', 13);
        $this->fpdf->Cell(190, 10, utf8_decode("Reporte de MPS"), 0, 0, 'C');
        $this->fpdf->Ln(15);

        $this->fpdf->SetFont('Arial', 'B', 9);
        $this->fpdf->SetFillColor(238, 238, 238);
        $this->fpdf->SetDrawColor(238, 238, 238);
        $this->fpdf->SetTextColor(0, 0, 0);

        // 
        $this->fpdf->SetFont('Arial', 'B', 9);
        $this->fpdf->SetFillColor(238, 238, 238);
        $this->fpdf->SetDrawColor(238, 238, 238);
        $this->fpdf->SetTextColor(0, 0, 0);
        $this->fpdf->Cell(190, 10, utf8_decode(mb_strtoupper('Detalles del MPS:', "UTF-8")), 1, 0, 'L', 1);
        $this->fpdf->Ln(15);

        $this->tupla("Tipo", $mps->tipo);
        $this->tupla("Fecha", $mps->fecha_solicitud);
        $this->tupla("Estado", $mps->estado);
        $this->fpdf->Ln(5);

        //header del contenido
        $this->fpdf->SetFont('Arial', 'B', 9);
        $this->fpdf->SetFillColor(238, 238, 238);
        $this->fpdf->SetDrawColor(238, 238, 238);
        $this->fpdf->SetTextColor(0, 0, 0);
        $this->fpdf->Cell(190, 10, utf8_decode(mb_strtoupper('Lista de produccón:', "UTF-8")), 1, 0, 'L', 1);
        $this->fpdf->Ln(15);

        $query = EstadoPedido::where('mps_id', $id)->get();

        // Datos de la tabla
        foreach ($query as $key => $tupla) {
            $this->tupla("Número", $key);
            $this->tupla("Nombre", $tupla->detallePedido->producto->nombre);
            $this->tupla("Cantidad total", $tupla->cantidad_total);
            $this->tupla("Cantidad en stock", $tupla->cantidad_stock);
            $this->tupla("Cantidad faltante", $tupla->cantidad_total - $tupla->cantidad_stock);
            $this->tupla("Estado", $tupla->estado);
            $this->fpdf->SetDrawColor(130, 139, 139);
            $this->fpdf->Line(10, $this->fpdf->GetY() + 5, 200, $this->fpdf->GetY() + 5);
            $this->fpdf->Ln(10);
        }
        $this->fpdf->Output("I", "Reporte de mps" . ".pdf", true);
    }

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

    public function pdf()
    {
        $empresa = Empresa::first();
        $this->fpdf->AddPage();
        $this->fpdf->SetMargins(10, 10, 10);
        $this->fpdf->SetAutoPageBreak(true, 20);
        $this->Header($empresa);

        $this->fpdf->SetFont('Arial', 'B', 13);
        $this->fpdf->Cell(190, 10, utf8_decode("Reporte de problemas de producción"), 0, 0, 'C');
        $this->fpdf->Ln(15);

        $this->fpdf->SetFont('Arial', 'B', 9);
        $this->fpdf->SetFillColor(238, 238, 238);
        $this->fpdf->SetDrawColor(238, 238, 238);
        $this->fpdf->SetTextColor(0, 0, 0);

        $query = Problema::all();

        //header del contenido
        $this->fpdf->SetFont('Arial', 'B', 9);
        $this->fpdf->SetFillColor(238, 238, 238);
        $this->fpdf->SetDrawColor(238, 238, 238);
        $this->fpdf->SetTextColor(0, 0, 0);
        $this->fpdf->Cell(190, 10, utf8_decode(mb_strtoupper('Contenido:', "UTF-8")), 1, 0, 'L', 1);
        $this->fpdf->Ln(15);

        // Datos de la tabla
        foreach ($query as $key => $tupla) {
            $this->tupla("Codigo", $key);
            $this->tupla("Codigo de manufactura", $tupla->manufactura_id);
            $this->tupla("Nombre del procesos", $tupla->proceso->nombre);
            $this->tupla("Tipo de problema", $tupla->tipo_problema);
            $this->tupla("Fecha", $tupla->fecha);
            $this->tupla("Estado", $tupla->estado);
            $this->tupla("Descripción", $tupla->descripcion);
            $this->fpdf->SetDrawColor(130, 139, 139);
            $this->fpdf->Line(10, $this->fpdf->GetY() + 5, 200, $this->fpdf->GetY() + 5);
            $this->fpdf->Ln(10);
        }
        $this->fpdf->Output("I", "Reporte de problemas de producción" . ".pdf", true);
    }

    public function tupla($header, $dato)
    {
        $this->fpdf->SetFont('Arial', 'B', 9);
        $this->fpdf->Cell(50, 10, utf8_decode(mb_strtoupper($header, "UTF-8") . " :"), 0, 0, 'L', 0);
        if ($header == "Descripción") {
            $this->fpdf->Ln(10);
        }
        $this->fpdf->SetFont('Arial', 'I', 9);
        $this->fpdf->MultiCell(170, 10, utf8_decode($dato), 0, 'L', 0);
    }
}
