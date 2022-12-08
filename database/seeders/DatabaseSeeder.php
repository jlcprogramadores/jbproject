<?php

namespace Database\Seeders;

use App\Models\TipoDeDireccione;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(UnidadSeeder::class);
        $this->call(IvaSeeder::class);
        $this->call(FamiliaSeeder::class);
        $this->call(TipoDeIngresoSeeder::class);
        $this->call(TipoDeDireccioneSeeder::class);
        $this->call(CategoriasFamiliaSeeder::class);
        $this->call(ProyectoSeeder::class);
        $this->call(CategoriasDeEntradaSeeder::class);
        $this->call(ProveedoreSeeder::class);
        $this->call(ClienteSeeder::class);
    }
}
