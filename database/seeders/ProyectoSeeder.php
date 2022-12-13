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
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proyecto::create([            
            'nombre' => 'BANDO DE LIMPIAS AURA',
            'descripcion' => 'Proyecto de Ejemplo',
            'numero_de_proyecto' => 2,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proyecto::create([            
            'nombre' => 'BODEGA JB',
            'descripcion' => 'Proyecto de Ejemplo',
            'numero_de_proyecto' => 3,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proyecto::create([            
            'nombre' => 'COMPLEMENTO FLETE PARO 1 MAYO',
            'descripcion' => 'Proyecto de Ejemplo',
            'numero_de_proyecto' => 4,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proyecto::create([            
            'nombre' => 'ESCALERAS Y CONTRATO 21-016 AURA',
            'descripcion' => 'Proyecto de Ejemplo',
            'numero_de_proyecto' => 5,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proyecto::create([            
            'nombre' => 'JAVIER BARRRIOS LARA',
            'descripcion' => 'Proyecto de Ejemplo',
            'numero_de_proyecto' => 6,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proyecto::create([            
            'nombre' => 'JAVIER BARRRIOS SERRANO',
            'descripcion' => 'Proyecto de Ejemplo',
            'numero_de_proyecto' => 7,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proyecto::create([            
            'nombre' => 'JORNALES FRESNILLO',
            'descripcion' => 'Proyecto de Ejemplo',
            'numero_de_proyecto' => 8,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proyecto::create([            
            'nombre' => 'MANIOBRA SLP',
            'descripcion' => 'Proyecto de Ejemplo',
            'numero_de_proyecto' => 9,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proyecto::create([            
            'nombre' => 'OC21-01207 TUBERIA 4" EN FILTROS AURA',
            'descripcion' => 'Proyecto de Ejemplo',
            'numero_de_proyecto' => 10,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proyecto::create([            
            'nombre' => 'OTROS',
            'descripcion' => 'Proyecto de Ejemplo',
            'numero_de_proyecto' => 11,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proyecto::create([            
            'nombre' => 'PARO 1 MAYO 2022',
            'descripcion' => 'Proyecto de Ejemplo',
            'numero_de_proyecto' => 12,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proyecto::create([            
            'nombre' => 'PARO 13 ABRIL SAUCITO',
            'descripcion' => 'Proyecto de Ejemplo',
            'numero_de_proyecto' => 13,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proyecto::create([            
            'nombre' => 'PARO 19 JUL SAUCITO',
            'descripcion' => 'Proyecto de Ejemplo',
            'numero_de_proyecto' => 14,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proyecto::create([            
            'nombre' => 'PARO 20 JUL SAUCITO',
            'descripcion' => 'Proyecto de Ejemplo',
            'numero_de_proyecto' => 15,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proyecto::create([            
            'nombre' => 'PARO 4 Y 5 DE OCTUBRE AURA',
            'descripcion' => 'Proyecto de Ejemplo',
            'numero_de_proyecto' => 16,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proyecto::create([            
            'nombre' => 'PARO PLANTA II 3 DE AGO',
            'descripcion' => 'Proyecto de Ejemplo',
            'numero_de_proyecto' => 17,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proyecto::create([            
            'nombre' => 'PARO SAN JULIAN',
            'descripcion' => 'Proyecto de Ejemplo',
            'numero_de_proyecto' => 18,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proyecto::create([            
            'nombre' => 'PARO SAUCITO 12 FEB',
            'descripcion' => 'Proyecto de Ejemplo',
            'numero_de_proyecto' => 19,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proyecto::create([            
            'nombre' => 'PARO SAUCITO 15 JUN 2022 JB',
            'descripcion' => 'Proyecto de Ejemplo',
            'numero_de_proyecto' => 20,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proyecto::create([            
            'nombre' => 'PARO SAUCITO 27,28,29 Y 30 DE MAYO 22',
            'descripcion' => 'Proyecto de Ejemplo',
            'numero_de_proyecto' => 21,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proyecto::create([            
            'nombre' => 'PARO SAUCITO 6 JULIO 2022',
            'descripcion' => 'Proyecto de Ejemplo',
            'numero_de_proyecto' => 22,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proyecto::create([            
            'nombre' => 'PARO SAUCITO 7 FEB',
            'descripcion' => 'Proyecto de Ejemplo',
            'numero_de_proyecto' => 23,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proyecto::create([            
            'nombre' => 'PARO SAUCITO 8 JUN',
            'descripcion' => 'Proyecto de Ejemplo',
            'numero_de_proyecto' => 24,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proyecto::create([            
            'nombre' => 'PLANTA OXIGENO',
            'descripcion' => 'Proyecto de Ejemplo',
            'numero_de_proyecto' => 25,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proyecto::create([            
            'nombre' => 'PLANTA PTAR',
            'descripcion' => 'Proyecto de Ejemplo',
            'numero_de_proyecto' => 26,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proyecto::create([            
            'nombre' => 'PORTONES AURA OC 11002516',
            'descripcion' => 'Proyecto de Ejemplo',
            'numero_de_proyecto' => 27,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proyecto::create([            
            'nombre' => 'PTAR MSJCM01/21',
            'descripcion' => 'Proyecto de Ejemplo',
            'numero_de_proyecto' => 28,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proyecto::create([            
            'nombre' => 'SOCAVON ESTRUCTURA 2 OC 11001756 28 FEB 22',
            'descripcion' => 'Proyecto de Ejemplo',
            'numero_de_proyecto' => 29,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proyecto::create([            
            'nombre' => 'SOCAVON ESTRUCTURA 3 OC 11002610 23 MAY 22',
            'descripcion' => 'Proyecto de Ejemplo',
            'numero_de_proyecto' => 30,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Proyecto::create([            
            'nombre' => 'TODOS LOS PROYECTOS',
            'descripcion' => 'Proyecto de Ejemplo',
            'numero_de_proyecto' => 31,
            'es_activo' => 1,
            'usuario_edito' => 'Administrador',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        
    }
}
