<?php

namespace Database\Seeders;

use App\Models\TipoDeDireccione;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TipoDeDireccioneSeeder extends Seeder
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

        TipoDeDireccione::create([
            'nombre' => 'Fiscal',
            'es_fiscal' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        TipoDeDireccione::create([
            'nombre' => 'No Fiscal',
            'es_fiscal' => 0,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
    }
}
