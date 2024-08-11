<?php

namespace Database\Seeders;

use App\Models\Categorias;
use App\Models\Materiales;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $productos = [
            // Plásticos
            [
                'categorias_id' => 1, // Plásticos PET
                'nombre' => 'Botella PET',
                'descripcion' => 'Botella de plástico reciclable de tipo PET.',
                'estado' => 1
            ],
            [
                'categorias_id' => 1, // Plásticos HDPE
                'nombre' => 'Envase HDPE',
                'descripcion' => 'Envase de plástico reciclable de alta densidad.',
                'estado' => 1
            ],
            [
                'categorias_id' => 1, // Plásticos LDPE
                'nombre' => 'Bolsa de Plástico LDPE',
                'descripcion' => 'Bolsa plástica reciclable de baja densidad.',
                'estado' => 1
            ],
            [
                'categorias_id' => 1, // Plásticos PP
                'nombre' => 'Tapa de Plástico PP',
                'descripcion' => 'Tapa de botella hecha de polipropileno.',
                'estado' => 1
            ],
            [
                'categorias_id' => 1, // Plásticos PS
                'nombre' => 'Vaso Desechable PS',
                'descripcion' => 'Vaso de plástico desechable de poliestireno.',
                'estado' => 1
            ],
            [
                'categorias_id' => 1, // Plásticos PVC
                'nombre' => 'Tubería de PVC',
                'descripcion' => 'Tubería de plástico de cloruro de polivinilo.',
                'estado' => 1
            ],
            
            // Papel y Cartón
            [
                'categorias_id' => 2, // Papel Blanco
                'nombre' => 'Papel de Oficina',
                'descripcion' => 'Hojas de papel blanco para impresión y escritura.',
                'estado' => 1
            ],
            [
                'categorias_id' => 2, // Papel Periódico
                'nombre' => 'Periódico',
                'descripcion' => 'Periódico reciclable.',
                'estado' => 1
            ],
            [
                'categorias_id' => 2, // Cartón Corrugado
                'nombre' => 'Caja de Cartón Corrugado',
                'descripcion' => 'Caja de cartón ondulado utilizada en embalajes.',
                'estado' => 1
            ],
            [
                'categorias_id' => 2, // Papel Kraft
                'nombre' => 'Bolsa de Papel Kraft',
                'descripcion' => 'Bolsa de papel marrón utilizada para empaques.',
                'estado' => 1
            ],
        
            // Vidrio
            [
                'categorias_id' => 3, // Vidrio Transparente
                'nombre' => 'Botella de Vidrio Transparente',
                'descripcion' => 'Botella de vidrio transparente.',
                'estado' => 1
            ],
            [
                'categorias_id' => 3, // Vidrio Verde
                'nombre' => 'Botella de Vidrio Verde',
                'descripcion' => 'Botella de vidrio verde, comúnmente utilizada para vinos y cervezas.',
                'estado' => 1
            ],
            [
                'categorias_id' => 3, // Vidrio Ámbar
                'nombre' => 'Botella de Vidrio Ámbar',
                'descripcion' => 'Botella de vidrio color ámbar, utilizada para bebidas y medicamentos.',
                'estado' => 1
            ],
        
            // Metales
            [
                'categorias_id' => 4, // Metales Ferrosos
                'nombre' => 'Lata de Acero',
                'descripcion' => 'Lata de acero reciclable.',
                'estado' => 1
            ],
            [
                'categorias_id' => 4, // Metales No Ferrosos
                'nombre' => 'Lata de Aluminio',
                'descripcion' => 'Lata de aluminio reciclable.',
                'estado' => 1
            ],
            [
                'categorias_id' => 4, // Chatarra Metálica
                'nombre' => 'Chatarra Metálica',
                'descripcion' => 'Residuos de metales diversos reciclables.',
                'estado' => 1
            ],
        
            // Tetra Pak
            [
                'categorias_id' => 5, // Tetra Pak
                'nombre' => 'Envase de Leche Tetra Pak',
                'descripcion' => 'Envase de cartón multicapa para leche.',
                'estado' => 1
            ],
            [
                'categorias_id' => 5, // Tetra Pak
                'nombre' => 'Envase de Jugo Tetra Pak',
                'descripcion' => 'Envase de cartón multicapa para jugos.',
                'estado' => 1
            ],
        
            // Residuos Orgánicos
            [
                'categorias_id' => 6, // Residuos Orgánicos
                'nombre' => 'Cáscaras de Frutas',
                'descripcion' => 'Residuos orgánicos compostables.',
                'estado' => 1
            ],
            [
                'categorias_id' => 6, // Residuos Orgánicos
                'nombre' => 'Desechos de Jardín',
                'descripcion' => 'Restos de plantas y hojas.',
                'estado' => 1
            ],
        
            // Residuos Electrónicos
            [
                'categorias_id' => 7, // Electrónicos
                'nombre' => 'Teléfono Móvil Viejo',
                'descripcion' => 'Aparato electrónico obsoleto para reciclaje.',
                'estado' => 1
            ],
            [
                'categorias_id' => 7, // Electrónicos
                'nombre' => 'Batería de Litio',
                'descripcion' => 'Batería de litio para dispositivos electrónicos.',
                'estado' => 1
            ],
        
            // Textiles
            [
                'categorias_id' => 8, // Textiles
                'nombre' => 'Camiseta Usada',
                'descripcion' => 'Prenda de vestir para reciclaje.',
                'estado' => 1
            ],
            [
                'categorias_id' => 8, // Textiles
                'nombre' => 'Ropa Vieja',
                'descripcion' => 'Ropa usada en mal estado.',
                'estado' => 1
            ],
        
            // Aceite Usado
            [
                'categorias_id' => 9, // Aceite Usado
                'nombre' => 'Aceite de Cocina Usado',
                'descripcion' => 'Aceite de cocina para reciclaje.',
                'estado' => 1
            ],
        
            // Residuos Peligrosos
            [
                'categorias_id' => 10, // Residuos Peligrosos
                'nombre' => 'Batería Alcalina Usada',
                'descripcion' => 'Batería desechada que requiere reciclaje especializado.',
                'estado' => 1
            ],
            [
                'categorias_id' => 10, // Residuos Peligrosos
                'nombre' => 'Lata de Aerosol Vacía',
                'descripcion' => 'Envase de aerosol vacío, considerado residuo peligroso.',
                'estado' => 1
            ]
        ];
        
        foreach ($productos as $producto) {
            $categoria = Categorias::find($producto['categorias_id']);
            $producto['codigo'] = Materiales::generarCodigoMaterial($categoria);

            DB::table('materiales')->insert($producto);
        }
    }
}
