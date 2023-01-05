<?php

namespace Database\Seeders;

use App\Models\Mina;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MinaSeeder extends Seeder
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

        Mina::create([
            'nombre' => 'SAUCITO',
            'descripcion' => 'Descripcion Ejemplo',
            'abreviacion' => 'sau',
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Mina::create([
            'nombre' => 'CIENEGA',
            'descripcion' => 'Descripcion Ejemplo',
            'abreviacion' => 'ci',
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Mina::create([
            'nombre' => 'SAN JULIAN',
            'descripcion' => 'Descripcion Ejemplo',
            'abreviacion' => 'sj',
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

    }
}
