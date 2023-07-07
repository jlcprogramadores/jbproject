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
        Cliente::create([            
            'nombre' => 'TRES GUERRAS',
            'razon_social' => 'TRES GUERRAS',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        Cliente::create([            
            'nombre' => 'TRANSPORTES SANCHEZ',
            'razon_social' => 'TRANSPORTES SANCHEZ',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        Cliente::create([            
            'nombre' => 'MOBIL',
            'razon_social' => 'MOBIL',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        Cliente::create([            
            'nombre' => 'MINERA SAUCITO SA DE CV',
            'razon_social' => 'MINERA SAUCITO SA DE CV',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        Cliente::create([            
            'nombre' => 'MINERA SAN JULIAN SA DE CV',
            'razon_social' => 'MINERA SAN JULIAN SA DE CV',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        Cliente::create([            
            'nombre' => 'MINERA ORO SILVER DE MEXICO SA DE CV',
            'razon_social' => 'MINERA ORO SILVER DE MEXICO SA DE CV',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        Cliente::create([            
            'nombre' => 'MINERA ORO SILVER',
            'razon_social' => 'MINERA ORO SILVER',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        Cliente::create([            
            'nombre' => 'MINERA MEXICANA LA CIENEGA SA DE CV',
            'razon_social' => 'MINERA MEXICANA LA CIENEGA SA DE CV',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        Cliente::create([            
            'nombre' => 'MINERA FRESNILLO',
            'razon_social' => 'MINERA FRESNILLO',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        Cliente::create([            
            'nombre' => 'MARGARITO MEDELLIN',
            'razon_social' => 'MARGARITO MEDELLIN',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        Cliente::create([            
            'nombre' => 'LAURA LIRMAR',
            'razon_social' => 'LAURA LIRMAR',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        Cliente::create([            
            'nombre' => 'EDUARDO BARRAZA',
            'razon_social' => 'EDUARDO BARRAZA',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        Cliente::create([            
            'nombre' => 'JEEP',
            'razon_social' => 'JEEP',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        Cliente::create([            
            'nombre' => 'JAVIER BARRIOS SERRANO',
            'razon_social' => 'JAVIER BARRIOS SERRANO',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        Cliente::create([            
            'nombre' => 'JAVIER BARRIOS LARA',
            'razon_social' => 'JAVIER BARRIOS LARA',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        Cliente::create([            
            'nombre' => 'INDUSTRIAL & MINING SOLUTION',
            'razon_social' => 'INDUSTRIAL & MINING SOLUTION',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        Cliente::create([            
            'nombre' => 'IMPULSORA INTEGRAL VERACRUZ SA DE CV',
            'razon_social' => 'IMPULSORA INTEGRAL VERACRUZ SA DE CV',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        Cliente::create([            
            'nombre' => 'GRUPO ROSGO',
            'razon_social' => 'GRUPO ROSGO',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        Cliente::create([            
            'nombre' => 'CARLOS ALMARAZ',
            'razon_social' => 'CARLOS ALMARAZ',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        Cliente::create([            
            'nombre' => 'CARLOS ALBERTO ALVAREZ GONZALEZ',
            'razon_social' => 'CARLOS ALBERTO ALVAREZ GONZALEZ',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        Cliente::create([            
            'nombre' => 'ARMX',
            'razon_social' => 'ARMX',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        Cliente::create([            
            'nombre' => 'ARANZAZU HOLDING SA DE CV',
            'razon_social' => 'ARANZAZU HOLDING SA DE CV',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        Cliente::create([            
            'nombre' => 'ARANZAZU HOLDING',
            'razon_social' => 'ARANZAZU HOLDING',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        Cliente::create([            
            'nombre' => 'ALEJANDRO ERCE',
            'razon_social' => 'ALEJANDRO ERCE',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        Cliente::create([            
            'nombre' => 'ALEJANDRA YASSIN SOTO',
            'razon_social' => 'ALEJANDRA YASSIN SOTO',
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
    }
}
