<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class MediaSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('medias')->insert([
            [
                'url' => 'https://res.cloudinary.com/dxtlbsa62/image/upload/v1718133806/Verdies/Facultades/nwbtisn1rhfs018wljik.jpg',
                'public_id' => 'Verdies/Facultades/nwbtisn1rhfs018wljik',
                'imagenable_id' => 1,
                'imagenable_type' => 'App\Models\Areas',
            ],
            [
                'url' => 'https://res.cloudinary.com/dxtlbsa62/image/upload/v1718133805/Verdies/Facultades/cqw1ennel7e3fgf30chj.jpg',
                'public_id' => 'Verdies/Facultades/cqw1ennel7e3fgf30chj',
                'imagenable_id' => 2,
                'imagenable_type' => 'App\Models\Areas',
            ],
            [
                'url' => 'https://res.cloudinary.com/dxtlbsa62/image/upload/v1718133805/Verdies/Facultades/nronlwgvr0daldvryc1a.jpg',
                'public_id' => 'Verdies/Facultades/nronlwgvr0daldvryc1a',
                'imagenable_id' => 3,
                'imagenable_type' => 'App\Models\Areas',
            ],
         
        ]);

    }
}
