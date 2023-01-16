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
            'nombre' => 'LOS PARADOS',
            'proyecto_id' => 1,
            'grupo_id' => 1,
            'fecha_inicio' => $dateNow,
            'fecha_fin' => $dateNow,
            'comentario' => 'Comentario Ejemplo',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
    }
}
