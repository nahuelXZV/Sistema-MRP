<?php

namespace Database\Seeders;

use App\Models\Configuracion\SistemaUnidad;
use Illuminate\Database\Seeder;

class SistemaUnidadSeeder extends Seeder
{
    public $u = array("kilometro", "hectometro", "decametro", "metro", "decimetro", "centimetro", "milimetro", );
    public $a = array("km", "hm", "dam", "m", "dm", "cm", "mm", );

    public function run()
    {
        $n = sizeof($this->u) ;
        for ($i=0; $i < $n; $i++) { 
            SistemaUnidad::create([
                'nombre' => $this->u[$i],
                'abreviatura' => $this->a[$i]
            ]);
        }
    }
}
