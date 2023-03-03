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
            'nombre' => 'No Seleccionado',
            'razon_social' => 'No Seleccionado',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        Proveedore::create([            
            'nombre' => 'ADN',
            'razon_social' => 'LLANTAS Y SERVICIOS DEL MINERAL SA DE CV',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 2		
        Proveedore::create([            
            'nombre' => 'ALEJANDRO ERCE',
            'razon_social' => 'ALEJANDRO ERCE',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 3		            
        Proveedore::create([            
            'nombre' => 'ALBERTO TORRES',
            'razon_social' => 'APSA SANTIAGO S DE RL DE CV',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 4		                    
        Proveedore::create([            
            'nombre' => 'ALJESCA',
            'razon_social' => 'ALJESCA PREVENTION',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 5		
        Proveedore::create([            
            'nombre' => 'AMMMEC',
            'razon_social' => 'AMMMEC',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 6		    
        Proveedore::create([            
            'nombre' => 'ANDAMIOS SANTA CECILIA',
            'razon_social' => 'ISAAC DE AVILA RESENDEZ',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 7		
        Proveedore::create([            
            'nombre' => 'ANDREA BARRIOS',
            'razon_social' => 'ANDREA BARRIOS',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 8	
        Proveedore::create([            
            'nombre' => 'ANGEL FERNANDEZ MEDRANO',
            'razon_social' => 'ANGEL FERNANDEZ MEDRANO',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 9		                    
        Proveedore::create([            
            'nombre' => 'APYMSA',
            'razon_social' => 'AUTO PARTES Y MAS SA DE CV',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 10		
        Proveedore::create([            
            'nombre' => 'ARMANDO ALBAÑIL',
            'razon_social' => 'ARMANDO ALBAÑIL',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 11		                    
        Proveedore::create([            
            'nombre' => 'ATOCHA',
            'razon_social' => 'FERRETERIA ATOCHA SA DE CV ',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 12		
        Proveedore::create([            
            'nombre' => 'AUTOBUSES ESTRELLA BLANCA SA DE CV',
            'razon_social' => 'AUTOBUSES ESTRELLA BLANCA SA DE CV',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 13		
        Proveedore::create([            
            'nombre' => 'CAMPAMENTO FRESNILLO',
            'razon_social' => 'CAMPAMENTO FRESNILLO',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 14	                
        Proveedore::create([            
            'nombre' => 'CARGOTECNIA',
            'razon_social' => 'CARGOTECNIA EQUIPOS SA DE CV',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 15		                
        Proveedore::create([            
            'nombre' => 'CEFHSA',
            'razon_social' => 'FRANCISCO XAVIER FELIX RAMIREZ',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 16		        
        Proveedore::create([            
            'nombre' => 'CENTAUROS MAQUINAS Y HERRAMIENTAS',
            'razon_social' => 'MARIA ELENA CARRASCO BARRON',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 17		
        Proveedore::create([            
            'nombre' => 'CENTRO DE RADIOLOGIA Y ULTRASONIDO DE TUXPAN',
            'razon_social' => 'CENTRO DE RADIOLOGIA Y ULTRASONIDO DE TUXPAN',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 18		
        Proveedore::create([            
            'nombre' => 'CENTRO DIESEL PROFESIONAL',
            'razon_social' => 'CENTRO DIESEL PROFESIONAL',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 19		            
        Proveedore::create([            
            'nombre' => 'CESAR CALCAS',
            'razon_social' => 'FLOR NAYELI',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 20 	                    
        Proveedore::create([            
            'nombre' => 'CHEPE',
            'razon_social' => 'JOSE LUIS REYES',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        // 21	
        Proveedore::create([            
            'nombre' => 'CHIPOTLE',
            'razon_social' => 'CHIPOTLE',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);	
        // 22		            
        Proveedore::create([            
            'nombre' => 'COMEDOR CIENEGA',
            'razon_social' => 'JESUS ANTONIO DOMINGUEZ OCHOA',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 23	
        Proveedore::create([            
            'nombre' => 'COMERTEX',
            'razon_social' => 'COMERTEX',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);	
        // 24		
        Proveedore::create([            
            'nombre' => 'CONSTRUCCIONES AUTONOMAS NYPD',
            'razon_social' => 'CONSTRUCCIONES AUTONOMAS NYPD',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 25		    
        Proveedore::create([            
            'nombre' => 'CONTADOR JUAN CARLOS',
            'razon_social' => 'CONTADOR JUAN VALENZUELA',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 26		                    
        Proveedore::create([            
            'nombre' => 'DENNYS',
            'razon_social' => 'PROMOTORA DE RESTAURANTES DEL NORTE',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 27		                
        Proveedore::create([            
            'nombre' => 'DEPORTENIS',
            'razon_social' => 'COMERCIAL DEPORTENIS',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 28		        
        Proveedore::create([            
            'nombre' => 'DRA. DIANA CHAIREZ',
            'razon_social' => 'DIANA ROCIO CHAIREZ TRETO',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 29		        
        Proveedore::create([            
            'nombre' => 'DULCERIA LA NENA',
            'razon_social' => 'HORTENCIA MARIA CARRERA GONZALEZ',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 30	                
        Proveedore::create([            
            'nombre' => 'E. SOLEDAD',
            'razon_social' => 'ESTACION DE SERVICIOS SOLEDAD SA DE CV',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 31		            
        Proveedore::create([            
            'nombre' => 'EDUARDO COMEDOR',
            'razon_social' => 'ANGEL RAFAEL SAENZ BURCIAGA',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 32		
        Proveedore::create([            
            'nombre' => 'ERASTO ORPINEDA VILLANUEVA',
            'razon_social' => 'ERASTO ORPINEDA VILLANUEVA',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 33		                
        Proveedore::create([            
            'nombre' => 'FAM CLEAN',
            'razon_social' => 'DIANA GUADALUPE RODRIGUEZ BURCIAGA',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 34		 
        Proveedore::create([            
            'nombre' => 'FARMACIA GUADALAJARA',
            'razon_social' => 'FARMACIA GUADALAJARA',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 35	
        Proveedore::create([            
            'nombre' => 'FARMACIAS SIMILARES',
            'razon_social' => 'FARMACIAS SIMILARES',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 36		    
        Proveedore::create([            
            'nombre' => 'FERRETERIA EL ARBOLITO',
            'razon_social' => 'PINA FERRETEROS SA DE CV',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 37	        
        Proveedore::create([            
            'nombre' => 'FERRETERIA NOROESTE',
            'razon_social' => 'JOSE GUADALUPE LOPEZ ANDRADE',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 38		
        Proveedore::create([            
            'nombre' => 'FERRETERIA REGIONAL DEL PARRAL',
            'razon_social' => 'FERRETERIA REGIONAL DEL PARRAL',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 39
        Proveedore::create([            
            'nombre' => 'FISEI',
            'razon_social' => 'OSMAN DOMINGUEZ GOMEZ',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 40		
        Proveedore::create([            
            'nombre' => 'FORD',
            'razon_social' => 'FORD',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proveedore::create([            
            'nombre' => 'GUAY',
            'razon_social' => 'JUAN DANIEL CUMPLIDO MIER',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
	            
        Proveedore::create([            
            'nombre' => 'HERRAMIENTAS AG',
            'razon_social' => 'HERRAMIENTAS AG SA DE CV',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
	                
        Proveedore::create([            
            'nombre' => 'HOME DEPOT',
            'razon_social' => 'HOME DEPOT MEXICO S DE RL DE CV',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        	
        Proveedore::create([            
            'nombre' => 'HOROWICH',
            'razon_social' => 'HOROWICH',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
            
        Proveedore::create([            
            'nombre' => 'HOTEL CONCHA',
            'razon_social' => 'JAVIER HOMERO PEREZ RODRIGUEZ',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        		            
        Proveedore::create([            
            'nombre' => 'HOTEL LA CABAÑA',
            'razon_social' => 'HOTEL LA CABAÑA CIENEGA S, de R.L de C.V',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        		        
        Proveedore::create([            
            'nombre' => 'HOTEL SAN JULIAN',
            'razon_social' => 'DOMO REAL INMOBILIARIA, SA DE CV',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        	
        Proveedore::create([            
            'nombre' => 'IMPORTADORA Y COMERCIALIZADORA',
            'razon_social' => 'IMPORTADORA Y COMERCIALIZADORA',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        	
        Proveedore::create([            
            'nombre' => 'IMSS',
            'razon_social' => 'IMSS',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        		                    
        Proveedore::create([            
            'nombre' => 'INFRA',
            'razon_social' => 'INFRA SA DE CV',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        Proveedore::create([            
            'nombre' => 'INMOBILIARIA MOREIRA SA DE CV',
            'razon_social' => 'INMOBILIARIA MOREIRA SA DE CV',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
                        
        Proveedore::create([            
            'nombre' => 'INOVATECH',
            'razon_social' => 'MARTHA PATRICIA RIVERA HERNANDEZ',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        	
        Proveedore::create([            
            'nombre' => 'JAVIER BARRIOS LARA',
            'razon_social' => 'JAVIER BARRIOS LARA',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        Proveedore::create([            
            'nombre' => 'JAVIER BARRIOS SERRANO',
            'razon_social' => 'JAVIER BARRIOS SERRANO',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        Proveedore::create([            
            'nombre' => 'JEEP',
            'razon_social' => 'JEEP',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        Proveedore::create([            
            'nombre' => 'JORGE DOMINGUEZ',
            'razon_social' => 'JORGE DOMINGUEZ',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        		
        Proveedore::create([            
            'nombre' => 'JORGE IVAN PEDROZA PATIÑO',
            'razon_social' => 'J. JESUS MARTINEZ HORTA',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        		
        Proveedore::create([            
            'nombre' => 'JUAN DE DIOS LARA RODRIGUEZ',
            'razon_social' => 'JUAN DE DIOS LARA RODRIGUEZ',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        Proveedore::create([            
            'nombre' => 'JUGI D&C',
            'razon_social' => 'JUGI D&C',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        // 61		                
        Proveedore::create([            
            'nombre' => 'KASA MOTORS',
            'razon_social' => 'ROSA ISABEL BAEZ MARTINEZ',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 62	
        Proveedore::create([            
            'nombre' => 'LA LUZ DE TAMPICO',
            'razon_social' => 'LA LUZ DE TAMPICO',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);	
        // 63		
        Proveedore::create([            
            'nombre' => 'LABORATORIO MEDICO TUXPAN',
            'razon_social' => 'GUILLERMINA ESPINOZA OLVERA',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 64	
        Proveedore::create([            
            'nombre' => 'LIRMAR SA DE CV',
            'razon_social' => 'LIRMAR SA DE CV',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 65		
        Proveedore::create([            
            'nombre' => 'LIVERPOOL',
            'razon_social' => 'LIVERPOOL',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 66		
        Proveedore::create([            
            'nombre' => 'MACSTORE ZAC',
            'razon_social' => 'MACSTORE ZAC',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 67		                    
        Proveedore::create([            
            'nombre' => 'MANDUCA',
            'razon_social' => 'AIDA HUIZAR',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 68		
        Proveedore::create([            
            'nombre' => 'MANUEL MEDELLIN DJ',
            'razon_social' => 'MANUEL MEDELLIN DJ',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 69		
        Proveedore::create([            
            'nombre' => 'MARIA ELENA LOPEZ',
            'razon_social' => 'MARIA ELENA LOPEZ',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 70		
        Proveedore::create([            
            'nombre' => 'MIGUEL GONZALEZ APARICIO',
            'razon_social' => 'MIGUEL GONZALEZ APARICIO',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 71		            
        Proveedore::create([            
            'nombre' => 'MUEBLES MARCEL',
            'razon_social' => 'ROSA MARIA RODRIGUEZ DEL CAMPO',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 72		    
        Proveedore::create([            
            'nombre' => 'NETWI COMUNICACIONES',
            'razon_social' => 'CELIA CAROLINA LOPEZ RUIZ',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 73	
        Proveedore::create([            
            'nombre' => 'NUEVA WALMART DE MEXICO',
            'razon_social' => 'NUEVA WALMART DE MEXICO',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 74		
        Proveedore::create([            
            'nombre' => 'OFFICE DEPOT',
            'razon_social' => 'OFFICE DEPOT',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 75		                    
        Proveedore::create([            
            'nombre' => 'OLEZA',
            'razon_social' => 'MAYRA CECILIA HERNANDEZ LOPEZ',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 76		
        Proveedore::create([            
            'nombre' => 'OMNIBUS DE MÉXICO',
            'razon_social' => 'OMNIBUS DE MÉXICO',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 77		    J
        Proveedore::create([            
            'nombre' => 'OPTICA VISION DURANGO',
            'razon_social' => 'ORGE ALBERTO ROMERO CORONADO',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 78		            
        Proveedore::create([            
            'nombre' => 'ORALIA CIENEGA',
            'razon_social' => 'ORALIA RODRIGUES ROJO',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 79		                    
        Proveedore::create([            
            'nombre' => 'PANDORA',
            'razon_social' => 'PANDORA JEWELRY MEXICO',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 80	                
        Proveedore::create([            
            'nombre' => 'PARAMOUNT',
            'razon_social' => 'PARAMOUNT',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        // 81	                   
        Proveedore::create([            
            'nombre' => 'PASIEGA',
            'razon_social' => 'FERRETERIA LA PASIEGA SA DE CV',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 82		            
        Proveedore::create([            
            'nombre' => 'PING INTERNET',
            'razon_social' => 'MIGUEL ANGEL MARQUEZ SANCHEZ',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 83		            
        Proveedore::create([            
            'nombre' => 'PINTURAS OSEL',
            'razon_social' => 'MARICELA CALDERON VILLARREAL',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 84		                    
        Proveedore::create([            
            'nombre' => 'PRAXAIR',
            'razon_social' => 'GUILLERMO CLAUDIO PADILLA CARRASCO',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 85		                
        Proveedore::create([            
            'nombre' => 'PRESIDENCIA',
            'razon_social' => 'MUNICIPIO DE FRESNILLO',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 86		                
        Proveedore::create([            
            'nombre' => 'PROVESICSA',
            'razon_social' => 'PROVEEDORA DE SEGURIDAD INDUSTRIALDE CHIHUAHUA SA DE CV',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 87		
        Proveedore::create([            
            'nombre' => 'QUALITAS',
            'razon_social' => 'QUALITAS',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 88		
        Proveedore::create([            
            'nombre' => 'RADIODIFUSORA LA TREMENDA',
            'razon_social' => 'RADIO COMUNICACIÓN GAMAR S.A. DE C.V.',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 89		            
        Proveedore::create([            
            'nombre' => 'RASTREO TECH',
            'razon_social' => 'EDUARDO LOPEZ DE LARA ZORRILLA',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 90		                
        Proveedore::create([            
            'nombre' => 'REFACCIM',
            'razon_social' => 'VAZLO REFACCIM SA DE CV',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 91		
        Proveedore::create([            
            'nombre' => 'REGIO GAS LERDO SA DE CV',
            'razon_social' => 'REGIO GAS LERDO SA DE CV',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 92		
        Proveedore::create([            
            'nombre' => 'RESIDENTE CONCHA DEL ORO',
            'razon_social' => 'RESIDENTE CONCHA DEL ORO',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 93		
        Proveedore::create([            
            'nombre' => 'RESIDENTE SAN JULIAN',
            'razon_social' => 'RESIDENTE SAN JULIAN',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 94		
        Proveedore::create([            
            'nombre' => 'RESTARUANTE LA SIERRA',
            'razon_social' => 'RESTARUANTE LA SIERRA',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 95	
        Proveedore::create([            
            'nombre' => 'RESTAURANTE LA PARRILLA',
            'razon_social' => 'RESTAURANTE LA PARRILLA',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 96		    
        Proveedore::create([            
            'nombre' => 'RESTAURANTE LOS NIETOS',
            'razon_social' => 'ERASTO OPRINEDA VILLANUEVA',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 97		        
        Proveedore::create([            
            'nombre' => 'RESTAURANTE MARINA',
            'razon_social' => 'MARINA MARTINEZ ORPINEDA',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 98	
        Proveedore::create([            
            'nombre' => 'ROBERTO ',
            'razon_social' => 'ROBERTO ',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 99		    
        Proveedore::create([            
            'nombre' => 'RUVALCABA AUTOPARTES',
            'razon_social' => 'ROGELIO RUVALCABA FIGUEROA',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 100		                    
        Proveedore::create([            
            'nombre' => 'RYASA',
            'razon_social' => 'RODAMIENTOS Y ACCESORIOS',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        // 101	
        Proveedore::create([            
            'nombre' => 'SALUD LABORAL DE HERMOSILLO SLH',
            'razon_social' => 'SALUD LABORAL DE HERMOSILLO SLH',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 102		
        Proveedore::create([            
            'nombre' => 'SEÑORA MARICELA',
            'razon_social' => 'SEÑORA MARICELA',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 103		        
        Proveedore::create([            
            'nombre' => 'SERVIABAL',
            'razon_social' => 'ALFREDO ZEFERINO CHAVIRA CEPEDA',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 104		        
        Proveedore::create([            
            'nombre' => 'SERVICIO AGUILERA',
            'razon_social' => 'SERVICIO CASAL DE DURANGO',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 105		
        Proveedore::create([            
            'nombre' => 'SERVICIOS MIGDEL SA DE CV',
            'razon_social' => 'SERVICIOS MIGDEL SA DE CV',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 106		          
        Proveedore::create([            
            'nombre' => 'STARBUCKS',
            'razon_social' => 'STARBUCKS STORE',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 107		    
        Proveedore::create([            
            'nombre' => 'SUPER EL TURISTA',
            'razon_social' => 'EDITH IVONNE ORPINEDA RODRIGUEZ',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 108		    
        Proveedore::create([            
            'nombre' => 'SUSAN PHILADELPHIA',
            'razon_social' => 'SUSAN SALAS FLORES',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 109		
        Proveedore::create([            
            'nombre' => 'TELCEL',
            'razon_social' => 'TELCEL',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 110		                
        Proveedore::create([            
            'nombre' => 'TELMEX',
            'razon_social' => 'TELEFONOS DE MEXICO SAB DE CV',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 111		
        Proveedore::create([            
            'nombre' => 'TENNIX',
            'razon_social' => 'TENNIX',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 112		
        Proveedore::create([            
            'nombre' => 'TJMAXX',
            'razon_social' => 'TJMAXX',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        // 113		
        Proveedore::create([            
            'nombre' => 'TONCHE',
            'razon_social' => 'TONCHE',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 114		
        Proveedore::create([            
            'nombre' => 'TRANSPORTES CHIHUAHUENSES',
            'razon_social' => 'TRANSPORTES CHIHUAHUENSES',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 115		         
        Proveedore::create([            
            'nombre' => 'TRANSPORTES SANCHEZ',
            'razon_social' => 'VIAJES TURISTICOS Y EJECUTIVOS SANCHEZ LUNA SA DE CV',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 116		                    
        Proveedore::create([            
            'nombre' => 'TRUTH',
            'razon_social' => 'CONSTRUCTORA TRUTH S DE RL',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 117	                    
        Proveedore::create([            
            'nombre' => 'UNIDSER',
            'razon_social' => 'ELVIRA CABRAL ACUÑA',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 118		                    
        Proveedore::create([            
            'nombre' => 'VARIOS',
            'razon_social' => 'JAVIER BARRIOS LARA',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 119		                    
        Proveedore::create([            
            'nombre' => 'VELCO',
            'razon_social' => 'GRUPO VELCO DCN',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 120	
        Proveedore::create([            
            'nombre' => 'WERO ELECTRICO',
            'razon_social' => 'WERO ELECTRICO',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 121		        
        Proveedore::create([            
            'nombre' => 'YONKE DON JULIAN',
            'razon_social' => 'JAIME CARRION CARDOZA',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        // 122		
        Proveedore::create([            
            'nombre' => 'ZAIRO CONSTRUCTORA',
            'razon_social' => 'ZAIRO CONSTRUCTORA',
            'estado' => 'SIN ESTADO',
            'dias_de_credito' => 0,
            'monto_de_credito' => 0,
            'es_facturable' => 0,
            'mail' => 'SIN CORREO',
            'rfc' => 'SIN RFC',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

    }
}
