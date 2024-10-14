<?php

namespace Database\Seeders;

use App\Models\modulos as ModelsModulos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class modulos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $modulos = [
            [
                'nombre' => 'Gestión de Catalogos',
                'descripcion' => '',
                'icono' => 'bx bx-shopping-bag',
                'estado' => 1
            ],
            [
                'nombre' => 'Gestión de promociones',
                'descripcion' => '',
                'icono' => 'bx bx-tag',
                'estado' => 1
            ],
            [
                'nombre' => 'Áreas de conocimiento',
                'descripcion' => '',
                'icono' => 'bx bx-graduation',
                'estado' => 1
            ],
            [
                'nombre' => 'Gestión de reciclaje',
                'descripcion' => '',
                'icono' => 'bx bx-recycle',
                'estado' => 1
            ],
            [
                'nombre' => 'Gestión de usuarios',
                'descripcion' => '',
                'icono' => 'bx bx-user',
                'estado' => 1
            ],
        ];
        
        // Crear los modelos utilizando el array
        foreach ($modulos as $modulo) {
            ModelsModulos::create($modulo);
        }
    }
}
