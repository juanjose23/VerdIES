<?php

namespace Database\Seeders;

use App\Models\Carreras;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarrerasSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $carreras = [
            [
                'area_conocimientos_id' => 1, 
                'nombre' => 'Programa académico de Ingeniería Industrial',
                'descripcion' => '',
                'estado' => 1
            ],
            [
                'area_conocimientos_id' => 1, 
                'nombre' => 'Programa académico de Ingeniería Mecánica',
                'descripcion' => '',
                'estado' => 1
            ],
            [
                'area_conocimientos_id' => 1, 
                'nombre' => 'Programa académico de Ingeniería Civil',
                'descripcion' => '',
                'estado' => 1
            ],
            [
                'area_conocimientos_id' => 1, 
                'nombre' => 'Programa académico de Ingeniería Eléctrica',
                'descripcion' => '',
                'estado' => 1
            ],
            [
                'area_conocimientos_id' => 1, 
                'nombre' => 'Programa académico de Ingeniería en Economía y Negocios',
                'descripcion' => '',
                'estado' => 1
            ],
            [
                'area_conocimientos_id' => 1, 
                'nombre' => 'Programa académico de Arquitectura',
                'descripcion' => '',
                'estado' => 1
            ],
            
            [
                'area_conocimientos_id' => 2, 
                'nombre' => 'Programa académico de Ingeniería de Sistemas',
                'descripcion' => '',
                'estado' => 1
            ],
            [
                'area_conocimientos_id' => 2, 
                'nombre' => 'Programa académico de Ingeniería en Computación',
                'descripcion' => '',
                'estado' => 1
            ],
            [
                'area_conocimientos_id' => 2, 
                'nombre' => 'Programa académico de Ingeniería Electrónica',
                'descripcion' => '',
                'estado' => 1
            ],
            [
                'area_conocimientos_id' => 2, 
                'nombre' => 'Programa académico de Ingeniería en Telecomunicaciones',
                'descripcion' => '',
                'estado' => 1
            ],
            [
                'area_conocimientos_id' => 3, 
                'nombre' => 'Programa académico de Ingeniería Agrícola',
                'descripcion' => '',
                'estado' => 1
            ],
            [
                'area_conocimientos_id' => 3, 
                'nombre' => 'Programa académico de Ingeniería Química',
                'descripcion' => '',
                'estado' => 1
            ],
            [
                'area_conocimientos_id' => 4, 
                'nombre' => 'Personal administrativo',
                'descripcion' => '',
                'estado' => 1
            ],
            [
                'area_conocimientos_id' => 4, 
                'nombre' => 'Docente',
                'descripcion' => '',
                'estado' => 1
            ],
        ];
        foreach ($carreras as $carrera) {
            Carreras::create($carrera);
        }
    }
}
