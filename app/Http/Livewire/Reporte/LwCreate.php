<?php

namespace App\Http\Livewire\Reporte;

use App\Models\Cliente;
use App\Models\CompraDistribucion\Distribuidor;
use App\Models\CompraDistribucion\Proveedor;
use App\Models\Inventario\MateriaPrima;
use App\Models\Inventario\Producto;
use App\Models\Produccion\Maquinaria;
use App\Models\User;
use Livewire\Component;

class LwCreate extends Component
{
    //IU
    public $modelos = [];
    public $atributosM = [];
    public $tipo = 'defecto';
    public $IU = [];
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
            [
                "id" => 'distribuidors',
                "Modelo" =>  "Distribuidoras"
            ],
            [
                "id" => 'maquinarias',
                "Modelo" =>  "Maquinaria"
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

    public function render()
    {
        $default = $this->AtributteModel($this->datos['modelo']);
        $interface = $this->InterfaceModel($this->datos['modelo']);
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
            case 'distribuidors':
                $this->atributosM = Distribuidor::$atributos;
                break;
            case 'maquinarias':
                $this->atributosM = Maquinaria::$atributos;
                break;
            default:
                $this->atributosM = [];
                break;
        }
        foreach ($this->atributosM as $key => $value) {
            //verifica si el value esta en default y devuelve la posicion del array
            $posicion = array_search($value, $default);
            $this->IU[$key] = $interface[$posicion];
        }
        return view('livewire.reporte.lw-create');
    }
}
