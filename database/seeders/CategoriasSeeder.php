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
                'nombre' => 'Plásticos PET',
                'descripcion' => 'Botellas de plástico de bebidas, envases de alimentos, productos de tereftalato de polietileno (PET)',
                'estado' => 1
            ],
            [
                'nombre' => 'Plásticos HDPE',
                'descripcion' => 'Envases de productos de limpieza, productos de alta densidad de polietileno (HDPE)',
                'estado' => 1
            ],
            [
                'nombre' => 'Plásticos LDPE y Otros Plásticos',
                'descripcion' => 'Bolsas de plástico, films plásticos, productos de baja densidad de polietileno (LDPE) y otros plásticos no PET o HDPE',
                'estado' => 1
            ],
            [
                'nombre' => 'Papel y Cartón',
                'descripcion' => 'Periódicos, revistas, cajas de cartón, papel de oficina, papeles mixtos',
                'estado' => 1
            ],
            [
                'nombre' => 'Vidrio',
                'descripcion' => 'Botellas de vidrio, frascos de vidrio, vidrio transparente y de color',
                'estado' => 1
            ],
            [
                'nombre' => 'Metales Ferrosos',
                'descripcion' => 'Latas de acero, chatarra metálica que contiene hierro',
                'estado' => 1
            ],
            [
                'nombre' => 'Metales No Ferrosos',
                'descripcion' => 'Latas de aluminio, chatarra metálica de aluminio, cobre, bronce y otros metales no ferrosos',
                'estado' => 1
            ],
            [
                'nombre' => 'Tetra Pak',
                'descripcion' => 'Envases de cartón para bebidas como leche, jugos, que combinan capas de cartón, plástico y aluminio',
                'estado' => 1
            ],
            [
                'nombre' => 'Residuos Orgánicos',
                'descripcion' => 'Residuos de alimentos, desechos de jardín, compostables',
                'estado' => 1
            ],
            [
                'nombre' => 'Residuos Electrónicos',
                'descripcion' => 'Aparatos electrónicos pequeños, teléfonos móviles, cargadores, pequeños electrodomésticos',
                'estado' => 1
            ],
            [
                'nombre' => 'Textiles',
                'descripcion' => 'Ropa, zapatos, telas, productos de algodón y otros tejidos',
                'estado' => 1
            ],
            [
                'nombre' => 'Aceite Usado',
                'descripcion' => 'Aceite de cocina usado, aceites industriales, lubricantes',
                'estado' => 1
            ],
            [
                'nombre' => 'Residuos Peligrosos',
                'descripcion' => 'Pilas y baterías, productos químicos domésticos, pinturas, solventes, lámparas fluorescentes',
                'estado' => 1
            ]
        ];
        

        foreach ($categorias as $categoria) {
            Categorias::create($categoria);
          
        }

    }
}
