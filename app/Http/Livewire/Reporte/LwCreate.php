<?php

namespace App\Http\Livewire\Reporte;

use App\Models\Cliente;
use App\Models\CompraDistribucion\Proveedor;
use App\Models\Inventario\MateriaPrima;
use App\Models\Inventario\Producto;
use App\Models\User;
use Livewire\Component;

class LwCreate extends Component
{
    //IU
    public $modelos = [];
    public $atributosM = [];
    public $tipo = 'defecto';

    //Controller
    public $datos = [];
    public $atributos = [];
    public $extension;
    public $contenido;

    public function mount()
    {
        $this->modelos = [
            [
                "id" => 'users',
                "Modelo" =>  "Usuario"
            ],
            [
                "id" => 'clientes',
                "Modelo" =>  "Cliente"
            ],
            [
                "id" => 'proveedors',
                "Modelo" =>  "Proveedores"
            ],
            [
                "id" => 'productos',
                "Modelo" =>  "Producto"
            ],
            [
                "id" => 'materia_primas',
                "Modelo" =>  "Materia Prima"
            ],

        ];
        $this->datos = [
            'nombre' => '',
            'modelo' => '',
        ];
    }

    public function limpiar()
    {
        $this->datos = [
            'nombre' => '',
            'modelo' => '',
        ];
        $this->atributos = [];
    }

    public function render()
    {
        switch ($this->datos['modelo']) {
            case 'users':
                $this->atributosM = User::$atributos;
                break;
            case 'clientes':
                $this->atributosM = Cliente::$atributos;
                break;
            case 'proveedors':
                $this->atributosM = Proveedor::$atributos;
                break;
            case 'productos':
                $this->atributosM = Producto::$atributos;
                break;
            case 'materia_primas':
                $this->atributosM = MateriaPrima::$atributos;
                break;
            default:
                $this->atributosM = [];
                break;
        }
        return view('livewire.reporte.lw-create');
    }
}
