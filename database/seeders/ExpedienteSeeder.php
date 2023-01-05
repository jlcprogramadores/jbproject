<?php

namespace Database\Seeders;

use App\Models\Expediente;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ExpedienteSeeder extends Seeder
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

        Expediente::create([
            'nombre' => 'contrato',
            'es_multiple' => 0,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Expediente::create([
            'nombre' => 'formato_alta',
            'es_multiple' => 0,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        Expediente::create([
            'nombre' => 'credencial',
            'es_multiple' => 0,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        Expediente::create([
            'nombre' => 'contrato',
            'es_multiple' => 0,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Expediente::create([
            'nombre' => 'aviso_privacidad',
            'es_multiple' => 0,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Expediente::create([
            'nombre' => 'aviso_confidencialidad',
            'es_multiple' => 0,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Expediente::create([
            'nombre' => 'alta_seguro_social',
            'es_multiple' => 0,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Expediente::create([
            'nombre' => 'solicitud_cv',
            'es_multiple' => 0,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Expediente::create([
            'nombre' => 'acta_de_nacimiento',
            'es_multiple' => 0,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Expediente::create([
            'nombre' => 'identificacion_oficial',
            'es_multiple' => 0,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Expediente::create([
            'nombre' => 'curp',
            'es_multiple' => 0,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Expediente::create([
            'nombre' => 'rfc',
            'es_multiple' => 0,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        Expediente::create([
            'nombre' => 'numero_imss',
            'es_multiple' => 0,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
 
        Expediente::create([
            'nombre' => 'vacunas_o_certificado_covid',
            'es_multiple' => 0,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
 
        Expediente::create([
            'nombre' => 'comprobante_domicilio',
            'es_multiple' => 0,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
 
        Expediente::create([
            'nombre' => 'comprobante_ultimos_estudios',
            'es_multiple' => 0,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
        Expediente::create([
            'nombre' => 'licencia_de_manejo',
            'es_multiple' => 0,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Expediente::create([
            'nombre' => 'acta_matrimonio',
            'es_multiple' => 0,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Expediente::create([
            'nombre' => 'acta_nacimiento_de_conyuge',
            'es_multiple' => 0,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Expediente::create([
            'nombre' => 'acta_nacimiento_de_hijos',
            'es_multiple' => 1,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Expediente::create([
            'nombre' => 'infonavit',
            'es_multiple' => 0,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Expediente::create([
            'nombre' => 'carta_no_antecedentes_penales',
            'es_multiple' => 0,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Expediente::create([
            'nombre' => 'cartas_recomendacion',
            'es_multiple' => 1,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Expediente::create([
            'nombre' => 'referencias_laborales',
            'es_multiple' => 1,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Expediente::create([
            'nombre' => 'dictamenes_medicos',
            'es_multiple' => 1,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Expediente::create([
            'nombre' => 'evaluacion_teorica',
            'es_multiple' => 0,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Expediente::create([
            'nombre' => 'entrevista_tecnica',
            'es_multiple' => 0,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Expediente::create([
            'nombre' => 'evaluacion_desempeno',
            'es_multiple' => 0,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Expediente::create([
            'nombre' => 'cartas_amonestacion',
            'es_multiple' => 1,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Expediente::create([
            'nombre' => 'capacitaciones_dc3',
            'es_multiple' => 1,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
    }
   
}