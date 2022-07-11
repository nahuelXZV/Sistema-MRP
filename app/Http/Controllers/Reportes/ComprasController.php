<?php

namespace App\Http\Controllers\Reportes;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use App\Models\CompraDistribucion\NotaCompra;
use App\Models\DetalleCompra;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Fpdf\Fpdf;

class ComprasController extends Controller
{
    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }
    public function rdc($id)
    {
        $compra = NotaCompra::find($id);
        $this->he("Reporte de Compra");

        // Detalles compra
        $this->fpdf->SetFont('Arial', 'B', 9);
        $this->fpdf->SetFillColor(238, 238, 238);
        $this->fpdf->SetDrawColor(238, 238, 238);
        $this->fpdf->SetTextColor(0, 0, 0);
        $this->fpdf->Cell(190, 10, utf8_decode(mb_strtoupper('Detalles de la compra:', "UTF-8")), 1, 0, 'L', 1);
        $this->fpdf->Ln(15);

        $this->tupla("Proveedor", $compra->proveedor->nombre_empresa);
        $this->tupla("Encargado", $compra->proveedor->encargado);
        $this->tupla("Costo total", $compra->costo_total);
        $this->tupla("Fecha", $compra->fecha);
        $this->tupla("Hora", $compra->hora);
        $this->fpdf->Ln(5);

        // Detalles productos
        $query = DetalleCompra::where('nota_compras_id', $id)->get();
        $this->fpdf->SetFont('Arial', 'B', 9);
        $this->fpdf->SetFillColor(238, 238, 238);
        $this->fpdf->SetDrawColor(238, 238, 238);
        $this->fpdf->SetTextColor(0, 0, 0);
        $this->fpdf->Cell(190, 10, utf8_decode(mb_strtoupper('Lista de materiales:', "UTF-8")), 1, 0, 'L', 1);
        $this->fpdf->Ln(15);

        foreach ($query as $key => $tupla) {
            $this->tupla("Número", $key + 1);
            $this->tupla("Nombre", $tupla->materia->nombre);
            $this->tupla("Color", $tupla->materia->color);
            $this->tupla("Tamaño", $tupla->materia->tamaño);
            $this->tupla("Cantidad", $tupla->cantidad);
            $this->tupla("Costo", $tupla->costo);
            $this->tupla("Descripción", $tupla->materia->descripcion);
            $this->fpdf->SetDrawColor(130, 139, 139);
            $this->fpdf->Line(10, $this->fpdf->GetY() + 5, 200, $this->fpdf->GetY() + 5);
            $this->fpdf->Ln(10);
        }

        $this->fpdf->Output("I", "Reporte de compra" . ".pdf", true);
    }

    public function he($titulo)
    {
        Bitacora::Bitacora('R', 'Reporte', '');
        $empresa = Empresa::first();
        $this->fpdf->AddPage();
        $this->fpdf->SetMargins(10, 10, 10);
        $this->fpdf->SetAutoPageBreak(true, 20);
        $this->Header($empresa);

        $this->fpdf->SetFont('Arial', 'B', 13);
        $this->fpdf->Cell(190, 10, utf8_decode($titulo), 0, 0, 'C');
        $this->fpdf->Ln(15);

        $this->fpdf->SetFont('Arial', 'B', 9);
        $this->fpdf->SetFillColor(238, 238, 238);
        $this->fpdf->SetDrawColor(238, 238, 238);
        $this->fpdf->SetTextColor(0, 0, 0);
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

    public function tupla($header, $dato)
    {
        $this->fpdf->SetFont('Arial', 'B', 9);
        $this->fpdf->Cell(30, 10, utf8_decode(mb_strtoupper($header, "UTF-8") . " :"), 0, 0, 'L', 0);
        if ($header == "Descripción") {
            $this->fpdf->Ln(10);
        }
        $this->fpdf->SetFont('Arial', 'I', 9);
        $this->fpdf->MultiCell(170, 10, utf8_decode($dato), 0, 'L', 0);
    }
    public function tupla2($header, $dato)
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
