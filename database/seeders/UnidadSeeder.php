<?php

namespace Database\Seeders;

use App\Models\Unidade;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UnidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();

        Unidade::create([
            'nombre' => 'PIEZA',
            'descripcion' => 'Unidad de Ejemplo',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Unidade::create([
            'nombre' => 'HR',
            'descripcion' => 'Unidad de Ejemplo',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Unidade::create([
            'nombre' => 'KGS',
            'descripcion' => 'Unidad de Ejemplo',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Unidade::create([
            'nombre' => 'KIT',
            'descripcion' => 'Unidad de Ejemplo',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Unidade::create([
            'nombre' => 'PIEZA',
            'descripcion' => 'Unidad de Ejemplo',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Unidade::create([
            'nombre' => 'SERVICIO',
            'descripcion' => 'Unidad de Ejemplo',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Unidade::create([
            'nombre' => 'LTS',
            'descripcion' => 'Unidad de Ejemplo',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
    }
}
