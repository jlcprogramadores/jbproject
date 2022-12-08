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
            'nombre' => 'MATERIAL',
            'descripcion' => 'Familia de Ejemplo',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Familia::create([
            'nombre' => 'SERVICIOS',
            'descripcion' => 'Familia de Ejemplo',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Familia::create([
            'nombre' => 'VIATICOS',
            'descripcion' => 'Familia de Ejemplo',
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
        
        Familia::create([
            'nombre' => 'FINANCIEROS_IN',
            'descripcion' => 'Familia de Ejemplo',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        Familia::create([
            'nombre' => 'FINANCIEROS_EGRESO',
            'descripcion' => 'Familia de Ejemplo',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        Familia::create([
            'nombre' => 'VEHICULOS',
            'descripcion' => 'Familia de Ejemplo',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        Familia::create([
            'nombre' => 'EQUIPO_MOVIL',
            'descripcion' => 'Familia de Ejemplo',
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
            'nombre' => 'TI',
            'descripcion' => 'Familia de Ejemplo',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        Familia::create([
            'nombre' => 'SERVICIO_MEDICO',
            'descripcion' => 'Familia de Ejemplo',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
    }
}
