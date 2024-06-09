<?php

namespace Database\Seeders;

use App\Models\submodulos as ModelsSubmodulos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class submodulos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $submodulos = [
            [
                'modulos_id'=>1,
                'nombre' => 'Categorías',
                'descripcion' => '',
                'enlace'=>'categorias.index',
                'estado' => 1
            ],
            [
                'modulos_id'=>1,
                'nombre' => 'Materiales',
                'descripcion' => '',
                'enlace'=>null,
                'estado' => 1
            ],
            [
                'modulos_id'=>1,
                'nombre' => 'Monedas',
                'descripcion' => '',
                'enlace'=>null,
                'estado' => 1
            ],
            [
                'modulos_id'=>1,
                'nombre' => 'Tasas',
                'descripcion' => '',
                'enlace'=>null,
                'estado' => 1
            ],
            [
                'modulos_id'=>2,
                'nombre' => 'Promociones',
                'descripcion' => '',
                'enlace'=>null,
                'estado' => 1
            ],
            [
                'modulos_id'=>2,
                'nombre' => 'Canje de promociones',
                'descripcion' => '',
                'enlace'=>null,
                'estado' => 1
            ],
            [
                'modulos_id'=>3,
                'nombre' => 'Área de conocimientos',
                'descripcion' => '',
                'enlace'=>null,
                'estado' => 1
            ],
            [
                'modulos_id'=>3,
                'nombre' => 'Carreras',
                'descripcion' => '',
                'enlace'=>null,
                'estado' => 1
            ],
            [
                'modulos_id'=>4,
                'nombre' => 'Centros de acopios',
                'descripcion' => '',
                'enlace'=>null,
                'estado' => 1
            ],
            [
                'modulos_id'=>4,
                'nombre' => 'Recicladoras',
                'descripcion' => '',
                'enlace'=>null,
                'estado' => 1
            ],
            [
                'modulos_id'=>4,
                'nombre' => 'Materiales reciclados',
                'descripcion' => '',
                'enlace'=>null,
                'estado' => 1
            ],
            [
                'modulos_id'=>5,
                'nombre' => 'Roles',
                'descripcion' => '',
                'enlace'=>'roles.index',
                'estado' => 1
            ],
            [
                'modulos_id'=>5,
                'nombre' => 'Usuarios',
                'descripcion' => '',
                'enlace'=>'usuarios.index',
                'estado' => 1
            ],
            [
                'modulos_id'=>5,
                'nombre' => 'Privilegios',
                'descripcion' => '',
                'enlace'=>'privilegios.index',
                'estado' => 1
            ],
            [
                'modulos_id'=>5,
                'nombre' => 'Permisos',
                'descripcion' => '',
                'enlace'=>'permisos.index',
                'estado' => 1
            ],
        ];

        // Crear los modelos utilizando el array
        foreach ($submodulos as $submodulo) {
            ModelsSubmodulos::create($submodulo);
        }
    }
}
