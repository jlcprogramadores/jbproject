<?php

namespace Database\Seeders;

use App\Models\TipoDeIngreso;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TipoDeIngresoSeeder extends Seeder
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

        TipoDeIngreso::create([
            'nombre' => 'CON CONTRATO',
            'descripcion' => 'Tipo de Ingreso de Ejemplo',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        TipoDeIngreso::create([
            'nombre' => 'SIN CONTRATO',
            'descripcion' => 'Tipo de Ingreso de Ejemplo',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

    }
}
