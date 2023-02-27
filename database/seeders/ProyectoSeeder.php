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
            'nombre' => 'AMPLIACION BODEGA JB',
            'descripcion' => 'AMPLIACION BODEGA JB',
            'numero_de_proyecto' => 1,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        Proyecto::create([            
            'nombre' => 'ARANZAZU HOLDING',
            'descripcion' => 'ARANZAZU HOLDING',
            'numero_de_proyecto' => 2,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'BODEGA JB',
            'descripcion' => 'BODEGA JB',
            'numero_de_proyecto' => 3,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'CAMPAMENTO JB/SAN JULIAN MSJ-COC-02-22 OBRA CIVIL Y SOLDADURA',
            'descripcion' => 'CAMPAMENTO JB/SAN JULIAN MSJ-COC-02-22 OBRA CIVIL Y SOLDADURA',
            'numero_de_proyecto' => 4,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'CASETA RV 175/SAN JULIAN MSJ-COC-02-22 OBRA CIVIL Y SOLDADURA',
            'descripcion' => 'CASETA RV 175/SAN JULIAN MSJ-COC-02-22 OBRA CIVIL Y SOLDADURA',
            'numero_de_proyecto' => 5,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        Proyecto::create([            
            'nombre' => 'CIENEGA',
            'descripcion' => 'CIENEGA',
            'numero_de_proyecto' => 6,
            'es_activo' => 6,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
          
        Proyecto::create([            
            'nombre' => 'CIENEGA MINA MMC-CM-28-21',
            'descripcion' => 'CIENEGA MINA MMC-CM-28-21',
            'numero_de_proyecto' => 7,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
          
        Proyecto::create([            
            'nombre' => 'CIENEGA PLANTA MMC-CM-29-21',
            'descripcion' => 'CIENEGA PLANTA MMC-CM-29-21',
            'numero_de_proyecto' => 8,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'CIENEGA PLANTA MMC-CM-29-21 PARO 01 DIC',
            'descripcion' => 'CIENEGA PLANTA MMC-CM-29-21 PARO 01 DIC',
            'numero_de_proyecto' => 9,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'CIENEGA PLANTA MMC-CM-29-21 PARO 15 NOV',
            'descripcion' => 'CIENEGA PLANTA MMC-CM-29-21 PARO 15 NOV',
            'numero_de_proyecto' => 10,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
 
        Proyecto::create([            
            'nombre' => 'CIENEGA PLANTA MMC-CM-29-21 PARO 1Y2 NOV',
            'descripcion' => 'CIENEGA PLANTA MMC-CM-29-21 PARO 1Y2 NOV',
            'numero_de_proyecto' => 11,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'CLINICA/SAN JULIAN MSJ-COC-02-22 OBRA CIVIL Y SOLDADURA',
            'descripcion' => 'CLINICA/SAN JULIAN MSJ-COC-02-22 OBRA CIVIL Y SOLDADURA',
            'numero_de_proyecto' => 12,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'DON JAVIER BARRIOS SERRANO',
            'descripcion' => 'DON JAVIER BARRIOS SERRANO',
            'numero_de_proyecto' => 13,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'ESCALERAS E CONTRATO 21-016 AURA',
            'descripcion' => 'ESCALERAS E CONTRATO 21-016 AURA',
            'numero_de_proyecto' => 14,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'ESTACION DE RESIDUOS/SAN JULIAN MSJ-COC-02-22 OBRA CIVIL Y SOLDADURA',
            'descripcion' => 'ESTACION DE RESIDUOS/SAN JULIAN MSJ-COC-02-22 OBRA CIVIL Y SOLDADURA',
            'numero_de_proyecto' => 15,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'GRUPO ROSGO SA DE CV',
            'descripcion' => 'GRUPO ROSGO SA DE CV',
            'numero_de_proyecto' => 16,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'JAVIER BARRIOS LARA',
            'descripcion' => 'JAVIER BARRIOS LARA',
            'numero_de_proyecto' => 17,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        Proyecto::create([            
            'nombre' => 'JAVIER BARRIOS SERRANO',
            'descripcion' => 'JAVIER BARRIOS SERRANO',
            'numero_de_proyecto' => 18,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'MJS-COC-02/22OBRA CIVIL SAN JULIAN',
            'descripcion' => 'MJS-COC-02/22OBRA CIVIL SAN JULIAN',
            'numero_de_proyecto' => 19,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'MODULOS FRESNILLO/SAN JULIAN MSJ-COC-02-22 OBRA CIVIL Y SOLDADURA',
            'descripcion' => 'MODULOS FRESNILLO/SAN JULIAN MSJ-COC-02-22 OBRA CIVIL Y SOLDADURA',
            'numero_de_proyecto' => 20,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'OFICINA JB',
            'descripcion' => 'OFICINA JB',
            'numero_de_proyecto' => 21,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        Proyecto::create([            
            'nombre' => 'OFICINAS JB',
            'descripcion' => 'OFICINAS JB',
            'numero_de_proyecto' => 22,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
          
        Proyecto::create([            
            'nombre' => 'PARO 1 DIC AURA',
            'descripcion' => 'PARO 1 DIC AURA',
            'numero_de_proyecto' => 23,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'PARO AURA 1 DIC',
            'descripcion' => 'PARO AURA 1 DIC',
            'numero_de_proyecto' => 24,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'PARO CIENEGA 1 OCT',
            'descripcion' => 'PARO CIENEGA 1 OCT',
            'numero_de_proyecto' => 25,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'PARO CIENEGA 1-2 FEB',
            'descripcion' => 'PARO CIENEGA 1-2 FEB',
            'numero_de_proyecto' => 26,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'PARO CIENEGA 3 ENE',
            'descripcion' => 'PARO CIENEGA 3 ENE',
            'numero_de_proyecto' => 27,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'PARO SAUCITO 14 OCT',
            'descripcion' => 'PARO SAUCITO 14 OCT',
            'numero_de_proyecto' => 28,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'PARO SAUCITO 25 DIC',
            'descripcion' => 'PARO SAUCITO 25 DIC',
            'numero_de_proyecto' => 29,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'PARO SAUCITO 28 OCT',
            'descripcion' => 'PARO SAUCITO 28 OCT',
            'numero_de_proyecto' => 30,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        Proyecto::create([            
            'nombre' => 'PARO SAUCITO 5 Y 6 ENE',
            'descripcion' => 'PARO SAUCITO 5 Y 6 ENE',
            'numero_de_proyecto' => 31,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]); 
         
        Proyecto::create([            
            'nombre' => 'PARO SAUCITO 6 OCT',
            'descripcion' => 'PARO SAUCITO 6 OCT',
            'numero_de_proyecto' => 32,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'PARO SAUCITO 6 Y 7 DIC',
            'descripcion' => 'PARO SAUCITO 6 Y 7 DIC',
            'numero_de_proyecto' => 33,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'PARO SAUCITO DEL 24 AL 26 DE ENERO DEL 2023',
            'descripcion' => 'PARO SAUCITO DEL 24 AL 26 DE ENERO DEL 2023',
            'numero_de_proyecto' => 34,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'PARO SAUCITO PLANTA I 06 Y 07 DIC',
            'descripcion' => 'PARO SAUCITO PLANTA I 06 Y 07 DIC',
            'numero_de_proyecto' => 35,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'PARO SAUCITO PLANTA I 20 OCT',
            'descripcion' => 'PARO SAUCITO PLANTA I 20 OCT',
            'numero_de_proyecto' => 36,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'PARO SAUCITO PLANTA I 24-27 ENE 23',
            'descripcion' => 'PARO SAUCITO PLANTA I 24-27 ENE 23',
            'numero_de_proyecto' => 37,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
          
        Proyecto::create([            
            'nombre' => 'PARO SAUCITO PLANTA II 25 DIC',
            'descripcion' => 'PARO SAUCITO PLANTA II 25 DIC',
            'numero_de_proyecto' => 38,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'PARO SAUCITO PLANTA II 25 OCT',
            'descripcion' => 'PARO SAUCITO PLANTA II 25 OCT',
            'numero_de_proyecto' => 39,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'PARO SAUCITO TIRO JARILLAS 5 Y 6 ENE',
            'descripcion' => 'PARO SAUCITO TIRO JARILLAS 5 Y 6 ENE',
            'numero_de_proyecto' => 40,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'PARO TIRO JARILLAS 14 OCT',
            'descripcion' => 'PARO TIRO JARILLAS 14 OCT',
            'numero_de_proyecto' => 41,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'PARO TIRO JARILLAS 6 OCT',
            'descripcion' => 'PARO TIRO JARILLAS 6 OCT',
            'numero_de_proyecto' => 42,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'PARO TIRO JARILLAS SAUCITO 16 Y 17 NOV',
            'descripcion' => 'PARO TIRO JARILLAS SAUCITO 16 Y 17 NOV',
            'numero_de_proyecto' => 43,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'PTAR MSJCM01/21',
            'descripcion' => 'PTAR MSJCM01/21',
            'numero_de_proyecto' => 44,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'RANCHO JB',
            'descripcion' => 'RANCHO JB',
            'numero_de_proyecto' => 45,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'SAN JULIAN MSJ-COC-02-22 OBRA CIVIL Y SOLDADURA',
            'descripcion' => 'SAN JULIAN MSJ-COC-02-22 OBRA CIVIL Y SOLDADURA',
            'numero_de_proyecto' => 46,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'SAN JULIAN MSJ-COC-02-22 OBRA CIVIL Y SOLDADURA/CASETA RV 175',
            'descripcion' => 'SAN JULIAN MSJ-COC-02-22 OBRA CIVIL Y SOLDADURA/CASETA RV 175',
            'numero_de_proyecto' => 47,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'SAN JULIAN MSJ-COC-02-22 OBRA CIVIL Y SOLDADURA/MODULOS FRESNILLO',
            'descripcion' => 'SAN JULIAN MSJ-COC-02-22 OBRA CIVIL Y SOLDADURA/MODULOS FRESNILLO',
            'numero_de_proyecto' => 48,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'SAUCITO PLD',
            'descripcion' => 'SAUCITO PLD',
            'numero_de_proyecto' => 49,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'SAUCITO PLP',
            'descripcion' => 'SAUCITO PLP',
            'numero_de_proyecto' => 50,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'SERVICIOS CONTABLES',
            'descripcion' => 'SERVICIOS CONTABLES',
            'numero_de_proyecto' => 51,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
         
        Proyecto::create([            
            'nombre' => 'SILVER GOLD',
            'descripcion' => 'SILVER GOLD',
            'numero_de_proyecto' => 52,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
            
        Proyecto::create([            
            'nombre' => 'TODOS LOS PROYECTOS',
            'descripcion' => 'TODOS LOS PROYECTOS',
            'numero_de_proyecto' => 53,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'presupuesto' => 1,
            'margen' => 2,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);           
    }
}
