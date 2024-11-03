<?php

namespace Database\Seeders;

use App\Models\Categorias;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categorias = [
            [
                'nombre' => 'Plásticos',
                'descripcion' => 'Botellas de plástico, envases de alimentos y bebidas, bolsas de plástico, plásticos de alta densidad (HDPE)',
                'estado' => 1,
                'tipo'=>0
            ],
            [
                'nombre' => 'Papel y Cartón',
                'descripcion' => 'Periódicos, revistas, cajas de cartón, papel de oficina',
                'estado' => 1,
                'tipo'=>0
            ],
            [
                'nombre' => 'Vidrio',
                'descripcion' => 'Botellas de vidrio, frascos de vidrio',
                'estado' => 1,
                'tipo'=>0
            ],
            [
                'nombre' => 'Metales',
                'descripcion' => 'Latas de aluminio, latas de acero, chatarra metálica',
                'estado' => 1,
                'tipo'=>0
            ],
            [
                'nombre' => 'Tetra Pak',
                'descripcion' => 'Envases de cartón para bebidas (leche, jugos)',
                'estado' => 1,
                'tipo'=>0
            ],
            [
                'nombre' => 'Orgánicos',
                'descripcion' => 'Residuos de alimentos, desechos de jardín',
                'estado' => 1,
                'tipo'=>0
            ],
            [
                'nombre' => 'Electrónicos',
                'descripcion' => 'Aparatos electrónicos pequeños, baterías, teléfonos móviles',
                'estado' => 1,
                'tipo'=>0
            ],
            [
                'nombre' => 'Textiles',
                'descripcion' => 'Ropa, zapatos, telas',
                'estado' => 1,
                'tipo'=>0
            ],
            [
                'nombre' => 'Aceite usado',
                'descripcion' => 'Aceite de cocina usado',
                'estado' => 1,
                'tipo'=>0
            ],
            [
                'nombre' => 'Residuos peligrosos',
                'descripcion' => 'Pilas y baterías, productos químicos domésticos, pinturas y solventes',
                'estado' => 1,
                'tipo'=>0
            ]
        ];


        foreach ($categorias as $categoria) {
            Categorias::create($categoria);
          
        }

    }
}
