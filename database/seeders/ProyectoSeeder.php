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
            'nombre' => 'ARANZAZU HOLDING',
            'descripcion' => 'Proyecto de Ejemplo',
            'numero_de_proyecto' => 1,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 10000.50,
            'margen' => 12000,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        
    }
}
