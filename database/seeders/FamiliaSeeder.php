<?php

namespace Database\Seeders;

use App\Models\Familia;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FamiliaSeeder extends Seeder
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

        Familia::create([
            'nombre' => 'SERVICIOS',
            'descripcion' => 'SERVICIOS',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Familia::create([
            'nombre' => 'FINANCIEROS_EGRESO',
            'descripcion' => 'FINANCIEROS_EGRESO',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Familia::create([
            'nombre' => 'VEHICULOS',
            'descripcion' => 'VEHICULOS',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Familia::create([
            'nombre' => 'MATERIAL',
            'descripcion' => 'MATERIAL',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        Familia::create([
            'nombre' => 'SERVICIO_MEDICO',
            'descripcion' => 'SERVICIO_MEDICO',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        Familia::create([
            'nombre' => 'EQUIPO_MOVIL',
            'descripcion' => 'EQUIPO_MOVIL',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        Familia::create([
            'nombre' => 'VIATICOS',
            'descripcion' => 'VIATICOS',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        Familia::create([
            'nombre' => 'TI',
            'descripcion' => 'TI',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        Familia::create([
            'nombre' => 'COMBUSTIBLE',
            'descripcion' => 'Familia de Ejemplo',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Familia::create([
            'nombre' => 'FINANCIEROS_IN',
            'descripcion' => 'FINANCIEROS_IN',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Familia::create([
            'nombre' => 'ADMIN',
            'descripcion' => 'Familia de Ejemplo',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

    }
}
