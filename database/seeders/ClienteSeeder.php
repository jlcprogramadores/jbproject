<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
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

        Cliente::create([            
            'nombre' => 'ARANZAZU HOLDING',
            'razon_social' => 'Razón Social Ejemplo',
            'mail' => 'mail@ejemplo.com',
            'rfc' => 'XAXX010101000',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Cliente::create([            
            'nombre' => 'COMERTEX',
            'razon_social' => 'Razón Social Ejemplo',
            'mail' => 'mail@ejemplo.com',
            'rfc' => 'XAXX010101000',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Cliente::create([            
            'nombre' => 'MINERA FRESNILLO',
            'razon_social' => 'Razón Social Ejemplo',
            'mail' => 'mail@ejemplo.com',
            'rfc' => 'XAXX010101000',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Cliente::create([            
            'nombre' => 'MINERA SAN JULIAN',
            'razon_social' => 'Razón Social Ejemplo',
            'mail' => 'mail@ejemplo.com',
            'rfc' => 'XAXX010101000',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Cliente::create([            
            'nombre' => 'MINERA SAUCITO',
            'razon_social' => 'Razón Social Ejemplo',
            'mail' => 'mail@ejemplo.com',
            'rfc' => 'XAXX010101000',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
    }
}
