<?php

namespace Database\Seeders;

use App\Models\Proyecto;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProyectoSeeder extends Seeder
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

        Proyecto::create([            
            'nombre' => 'No Seleccionado',
            'descripcion' => 'No Seleccionado',
            'numero_de_proyecto' => 0,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);   
    }
}
