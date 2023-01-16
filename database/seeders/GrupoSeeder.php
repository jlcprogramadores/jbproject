<?php

namespace Database\Seeders;

use App\Models\Grupo;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class GrupoSeeder extends Seeder
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

        // Grupo::create([
        //     'nombre' => 'Grupo A',
        //     'usuario_edito' => 'Administrador ',
        //     'created_at' => $dateNow,
        //     'updated_at' => $dateNow
        // ]);

    }
}
