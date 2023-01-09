<?php

namespace Database\Seeders;

use App\Models\Paro;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ParoSeeder extends Seeder
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

        Paro::create([
            'empleado_id' => 1,
            'proyecto_id' => 1,
            'puesto_id' => 1,
            'salario' => 15000,
            'fecha_inicio' => $dateNow,
            'fecha_fin' => $dateNow,
            'comentario' => 'Comentario Ejemplo',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
    }
}
