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
            'razon_social' => 'MINERA AURA ARANZAZU',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Cliente::create([            
            'nombre' => 'COMERTEX',
            'razon_social' => 'COMERTEX',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Cliente::create([            
            'nombre' => 'CONSTRUCCIONES AUTONOMAS NYPD',
            'razon_social' => 'CONSTRUCCIONES AUTONOMAS NYPD',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
	                    
        Cliente::create([            
            'nombre' => 'E. SOLEDAD',
            'razon_social' => 'ESTACION DE SERVICIOS SOLEDAD SA DE CV',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
           
        Cliente::create([            
            'nombre' => 'FORD GUADALAJARA',
            'razon_social' => 'PLASENCIA MOTORS GUADALAJARA S.A DE C.V.',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Cliente::create([            
            'nombre' => 'GRUPO ROSGO SA DE CV',
            'razon_social' => 'GRUPO ROSGO SA DE CV',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
	    
        Cliente::create([            
            'nombre' => 'MINERA MEXICANA LA CIENEGA',
            'razon_social' => 'MINERA MEXICANA LA CIENEGA SA DE CV',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Cliente::create([            
            'nombre' => 'MINERA SAN JULIAN',
            'razon_social' => 'MINERA SAN JULIAN',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Cliente::create([            
            'nombre' => 'MINERA SAUCITO',
            'razon_social' => 'MINERA SAUCITO',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Cliente::create([            
            'nombre' => 'TONCHE',
            'razon_social' => 'TONCHE',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Cliente::create([            
            'nombre' => 'TRUTH',
            'razon_social' => 'CONSTRUCTORA TRUTH S DE RL',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
 
        Cliente::create([            
            'nombre' => 'ZAIRO CONSTRUCTORA',
            'razon_social' => 'ZAIRO CONSTRUCTORA',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
    }
}
