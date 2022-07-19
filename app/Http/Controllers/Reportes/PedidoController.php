<?php

namespace App\Http\Controllers\Reportes;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use App\Models\CompraDistribucion\Pedido;
use App\Model;
use App\Models\DetallePedido;
use App\Models\Empresa;
use App\Models\Produccion\EstadoPedido;
use App\Models\Produccion\Mps;
use App\Models\Produccion\Problema;
use Illuminate\Http\Request;
use Fpdf\Fpdf;

class PedidoController extends Controller
{
    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }

    public function rdp($id)
    {
        $pedido = Pedido::find($id);
        $this->he("Reporte de Pedido");

        // Detalles pedido
        $this->fpdf->SetFont('Arial', 'B', 9);
        $this->fpdf->SetFillColor(238, 238, 238);
        $this->fpdf->SetDrawColor(238, 238, 238);
        $this->fpdf->SetTextColor(0, 0, 0);
        $this->fpdf->Cell(190, 10, utf8_decode(mb_strtoupper('Detalles del pedido:', "UTF-8")), 1, 0, 'L', 1);
        $this->fpdf->Ln(15);

        $this->tupla("Cliente", $pedido->cliente->nombre);
        $this->tupla("Estado", $pedido->estado);
        $this->tupla("Fecha", $pedido->fecha);
        $this->tupla("Hora", $pedido->hora);
        $this->tupla("Descripción", $pedido->descripcion);
        $this->fpdf->Ln(5);

        if ($pedido->distribuidor) {
            // Detalles envio
            $this->fpdf->SetFont('Arial', 'B', 9);
            $this->fpdf->SetFillColor(238, 238, 238);
            $this->fpdf->SetDrawColor(238, 238, 238);
            $this->fpdf->SetTextColor(0, 0, 0);
            $this->fpdf->Cell(190, 10, utf8_decode(mb_strtoupper('Detalles del envio:', "UTF-8")), 1, 0, 'L', 1);
            $this->fpdf->Ln(15);

            $this->tupla("Distribuidora", $pedido->distribuidor->nombre);
            $this->tupla("Dirección", $pedido->direccion);
            $this->fpdf->Ln(5);
        }

        // Detalles productos
        $query = DetallePedido::where('pedido_id', $id)->get();
        $this->fpdf->SetFont('Arial', 'B', 9);
        $this->fpdf->SetFillColor(238, 238, 238);
        $this->fpdf->SetDrawColor(238, 238, 238);
        $this->fpdf->SetTextColor(0, 0, 0);
        $this->fpdf->Cell(190, 10, utf8_decode(mb_strtoupper('Lista de productos:', "UTF-8")), 1, 0, 'L', 1);
        $this->fpdf->Ln(15);

        foreach ($query as $key => $tupla) {
            $this->tupla("Número", $key + 1);
            $this->tupla("Nombre", $tupla->producto->nombre);
            $this->tupla("Color", $tupla->producto->color);
            $this->tupla("Tamaño", $tupla->producto->tamaño);
            $this->tupla("Peso", $tupla->producto->peso);
            $this->tupla("Cantidad", $tupla->producto->cantidad);
            $this->tupla("Descripción", $tupla->producto->descripcion);
            $this->fpdf->SetDrawColor(130, 139, 139);
            $this->fpdf->Line(10, $this->fpdf->GetY() + 5, 200, $this->fpdf->GetY() + 5);
            $this->fpdf->Ln(10);
        }
        $mps = Mps::where('pedido_id', $id)->first();
        if ($mps != null) {
            $this->rmps($mps->id);
        }

        $this->fpdf->Output("I", "Reporte de pedido" . ".pdf", true);
    }

    public function rtp($id)
    {
    }

    public function rlp()
    {
        $this->he("Reporte de pedidos");
        // Detalles productos
        $query = Pedido::all();
        $this->fpdf->SetFont('Arial', 'B', 9);
        $this->fpdf->SetFillColor(238, 238, 238);
        $this->fpdf->SetDrawColor(238, 238, 238);
        $this->fpdf->SetTextColor(0, 0, 0);
        $this->fpdf->Cell(190, 10, utf8_decode(mb_strtoupper('Contenido:', "UTF-8")), 1, 0, 'L', 1);
        $this->fpdf->Ln(15);

        foreach ($query as $key => $tupla) {
            $this->tupla("Código", $tupla->id);
            $this->tupla("Cliente", $tupla->cliente->nombre);
            if ($tupla->distribuidor) {
                $this->tupla("Distribuidora", $tupla->distribuidor->nombre);
            }
            $this->tupla("Fecha", $tupla->fecha);
            $this->tupla("Estado", $tupla->estado);
            $this->tupla("Dirección", $tupla->direccion);
            $this->tupla("Descripción", $tupla->descripcion);
            $this->fpdf->SetDrawColor(130, 139, 139);
            $this->fpdf->Line(10, $this->fpdf->GetY() + 5, 200, $this->fpdf->GetY() + 5);
            $this->fpdf->Ln(10);
        }
        $this->fpdf->Output("I", "Reporte de pedidos" . ".pdf", true);
    }
    public function rpc()
    {
    }

    public function rmps($id)
    {
        $mps = Mps::find($id);
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
            $this->tupla2("Número", $key+1);
            $this->tupla2("Nombre", $tupla->detallePedido->producto->nombre);
            $this->tupla2("Cantidad total", $tupla->cantidad_total);
            $this->tupla2("Cantidad en stock", $tupla->cantidad_stock);
            $this->tupla2("Cantidad faltante", $tupla->cantidad_total - $tupla->cantidad_stock);
            $this->tupla2("Estado", $tupla->estado);
            $this->fpdf->SetDrawColor(130, 139, 139);
            $this->fpdf->Line(10, $this->fpdf->GetY() + 5, 200, $this->fpdf->GetY() + 5);
            $this->fpdf->Ln(10);
        }

        // Problemas de produccuion
        $query = Problema::where('mps_id', $mps->id)->get();

        //header del contenido
        $this->fpdf->SetFont('Arial', 'B', 9);
        $this->fpdf->SetFillColor(238, 238, 238);
        $this->fpdf->SetDrawColor(238, 238, 238);
        $this->fpdf->SetTextColor(0, 0, 0);
        $this->fpdf->Cell(190, 10, utf8_decode(mb_strtoupper('Problemas de produccion:', "UTF-8")), 1, 0, 'L', 1);
        $this->fpdf->Ln(15);

        $query = Problema::where('mps_id', $id)->get();
        // Datos de la tabla
        foreach ($query as $key => $tupla) {
            $this->tupla2("Codigo", $key);
            $this->tupla2("Codigo de manufactura", $tupla->manufactura_id);
            $this->tupla2("Nombre del procesos", $tupla->proceso->nombre);
            $this->tupla2("Tipo de problema", $tupla->tipo_problema);
            $this->tupla2("Fecha", $tupla->fecha);
            $this->tupla2("Estado", $tupla->estado);
            $this->tupla2("Descripción", $tupla->descripcion);
            $this->fpdf->SetDrawColor(130, 139, 139);
            $this->fpdf->Line(10, $this->fpdf->GetY() + 5, 200, $this->fpdf->GetY() + 5);
            $this->fpdf->Ln(10);
        }
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
