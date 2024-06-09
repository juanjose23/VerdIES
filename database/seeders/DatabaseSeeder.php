<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run(): void
    {
     
        $this->call(CategoriasSeeder::class);
        $this->call(MaterialesSeeders::class);
        $this->call(modulos::class);
        $this->call(submodulos::class);
        $this->call(permisos::class);
        $this->call(permisosmodulos::class);
        $this->call(RolesSeeder::class);
        $this->call(UsuariosSeeders::class);
        $this->call(RolesUsuariosSeeders::class);
        $this->call(PrivilegiosSeeders::class);
        $this->call(PermisosRolesSeeders::class);
    }
}
