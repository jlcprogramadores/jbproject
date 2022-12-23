<?php

namespace Database\Seeders;

use App\Models\Puesto;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PuestoSeeder extends Seeder
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

        Puesto::create([
            'nombre' => 'RESIDENTE',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        Puesto::create([
            'nombre' => 'SUPERVISOR OPERATIVO',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        Puesto::create([
            'nombre' => 'OFICIAL SOLDADOR',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);


    }
}
