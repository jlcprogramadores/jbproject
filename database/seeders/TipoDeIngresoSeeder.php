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
            'nombre' => 'No Seleccionado',
            'descripcion' => 'No Seleccionado',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        TipoDeIngreso::create([
            'nombre' => 'FIJO',
            'descripcion' => 'Tipo de Ingreso de Ejemplo',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        TipoDeIngreso::create([
            'nombre' => 'VARIABLE',
            'descripcion' => 'Tipo de Ingreso de Ejemplo',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        TipoDeIngreso::create([
            'nombre' => 'ESPORADICO',
            'descripcion' => 'Tipo de Ingreso de Ejemplo',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

    }
}
