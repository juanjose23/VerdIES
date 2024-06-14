<?php

namespace Database\Seeders;

use App\Models\Areas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreasSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $areas = [
            [
                'nombre' => 'Dirección de Área de Conocimiento de Ingeniería y Afines',
                'descripcion' => '',
                'estado' => 1
            ],
            [
                'nombre' => 'Dirección de Área de conocimiento de Tecnología de Información y Comunicación',
                'descripcion' => '',
                'estado' => 1
            ],
            [
                'nombre' => 'Dirección de Área de conocimiento de Agricultura',
                'descripcion' => '',
                'estado' => 1
            ],
          
           
        ];
        
        foreach ($areas as $area) {
            Areas::create($area);
        
        }

    }
}
