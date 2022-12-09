<?php

namespace Database\Seeders;

use App\Models\Proveedore;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProveedoreSeeder extends Seeder
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

        Proveedore::create([            
            'nombre' => 'ABARROTES MENDEZ SERRANO',
            'razon_social' => 'Razón Social Ejemplo',
            'estado' => 'Zacatecas',
            'dias_de_credito' => 1,
            'monto_de_credito' => 5000.00,
            'es_facturable' => 1,
            'mail' => 'mail@ejemplo.com',
            'rfc' => 'XAXX010101000',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proveedore::create([            
            'nombre' => 'ACCESORIOS PINEDO',
            'razon_social' => 'Razón Social Ejemplo',
            'estado' => 'Zacatecas',
            'dias_de_credito' => 1,
            'monto_de_credito' => 5000.00,
            'es_facturable' => 1,
            'mail' => 'mail@ejemplo.com',
            'rfc' => 'XAXX010101000',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proveedore::create([            
            'nombre' => 'ACEROS DE FRESNILLO',
            'razon_social' => 'Razón Social Ejemplo',
            'estado' => 'Zacatecas',
            'dias_de_credito' => 1,
            'monto_de_credito' => 5000.00,
            'es_facturable' => 1,
            'mail' => 'mail@ejemplo.com',
            'rfc' => 'XAXX010101000',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proveedore::create([            
            'nombre' => 'APYMSA',
            'razon_social' => 'Razón Social Ejemplo',
            'estado' => 'Zacatecas',
            'dias_de_credito' => 1,
            'monto_de_credito' => 5000.00,
            'es_facturable' => 1,
            'mail' => 'mail@ejemplo.com',
            'rfc' => 'XAXX010101000',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proveedore::create([            
            'nombre' => 'CASA DE VIDRIO',
            'razon_social' => 'Razón Social Ejemplo',
            'estado' => 'Zacatecas',
            'dias_de_credito' => 1,
            'monto_de_credito' => 5000.00,
            'es_facturable' => 1,
            'mail' => 'mail@ejemplo.com',
            'rfc' => 'XAXX010101000',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proveedore::create([            
            'nombre' => 'FERRETERIA EL ARBOLITO',
            'razon_social' => 'Razón Social Ejemplo',
            'estado' => 'Zacatecas',
            'dias_de_credito' => 1,
            'monto_de_credito' => 5000.00,
            'es_facturable' => 1,
            'mail' => 'mail@ejemplo.com',
            'rfc' => 'XAXX010101000',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proveedore::create([            
            'nombre' => 'GNP',
            'razon_social' => 'Razón Social Ejemplo',
            'estado' => 'Zacatecas',
            'dias_de_credito' => 1,
            'monto_de_credito' => 5000.00,
            'es_facturable' => 1,
            'mail' => 'mail@ejemplo.com',
            'rfc' => 'XAXX010101000',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proveedore::create([            
            'nombre' => 'UNIFORMES PROVIDENCIA',
            'razon_social' => 'Razón Social Ejemplo',
            'estado' => 'Zacatecas',
            'dias_de_credito' => 1,
            'monto_de_credito' => 5000.00,
            'es_facturable' => 1,
            'mail' => 'mail@ejemplo.com',
            'rfc' => 'XAXX010101000',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proveedore::create([            
            'nombre' => 'WALMART',
            'razon_social' => 'Razón Social Ejemplo',
            'estado' => 'Zacatecas',
            'dias_de_credito' => 1,
            'monto_de_credito' => 5000.00,
            'es_facturable' => 1,
            'mail' => 'mail@ejemplo.com',
            'rfc' => 'XAXX010101000',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
    }
}
