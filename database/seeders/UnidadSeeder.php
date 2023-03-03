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
            'nombre' => 'No Seleccionado',
            'descripcion' => 'No Seleccionado',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Unidade::create([
            'nombre' => 'SER',
            'descripcion' => 'Unidad de SER',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Unidade::create([
            'nombre' => 'ROLLO',
            'descripcion' => 'Unidad de ROLLO',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Unidade::create([
            'nombre' => 'PZA',
            'descripcion' => 'Unidad de PZA',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Unidade::create([
            'nombre' => 'PAR',
            'descripcion' => 'Unidad de PAR',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Unidade::create([
            'nombre' => 'PAQ',
            'descripcion' => 'Unidad de PAQ',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Unidade::create([
            'nombre' => 'PA',
            'descripcion' => 'Unidad de PA',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Unidade::create([
            'nombre' => 'MTS',
            'descripcion' => 'Unidad de MTS',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Unidade::create([
            'nombre' => 'M3',
            'descripcion' => 'Unidad de M3',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Unidade::create([
            'nombre' => 'M',
            'descripcion' => 'Unidad de M',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);


        Unidade::create([
            'nombre' => 'LOTE',
            'descripcion' => 'Unidad de LOTE',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Unidade::create([
            'nombre' => 'KG',
            'descripcion' => 'Unidad de KG',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
    }
}
