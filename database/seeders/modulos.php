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
                'icono' => 'bx bx-folder', // Boxicons para "shopping bag"
                'estado' => 1
            ],
            [
                'nombre' => 'Gestión de promociones',
                'descripcion' => '',
                'icono' => 'bx bx-gift', // Boxicons para "tags"
                'estado' => 1
            ],
            [
                'nombre' => 'Áreas de conocimiento',
                'descripcion' => '',
                'icono' => 'bx bx-book', // Boxicons para "graduation cap" (no hay ícono exacto, "book" es una opción)
                'estado' => 1
            ],
            [
                'nombre' => 'Gestión de reciclaje',
                'descripcion' => '',
                'icono' => 'bx bx-recycle', // Boxicons para "recycle"
                'estado' => 1
            ],
            [
                'nombre' => 'Gestión de usuarios',
                'descripcion' => '',
                'icono' => 'bx bx-user', // Boxicons para "users"
                'estado' => 1
            ],
        ];
        

        // Crear los modelos utilizando el array
        foreach ($modulos as $modulo) {
            ModelsModulos::create($modulo);
        }
    }
}
