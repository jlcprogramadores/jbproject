<?php

namespace Database\Seeders;

use App\Models\Empleado;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();

        Empleado::create([
            'proyecto_id' => 1,
            'puesto_id' => 1,
            'no_empleado' => 'JBCI00122',
            'nombre' => 'CARLOS ISAI ARTEAGA TREJO',
            'genero' => 'HOMBRE LIBRE NO BINARIO',
            'telefono_personal' => 4935123562,
            'correo' => 'ciat117@gmail.com',
            'salario_imss' => 1.25,
            'salario_real' => 0.25,
            'tipo_de_empleado' => 'CONTRATO',
            'evaluaciones' => 'EVALUACION EJEMPLO',
            'dc3' => 'CURSO APROBADO',
            'clims' => 'CLIMS EJEMPLO',
            'fecha_ingreso' => $dateNow,
            'fecha_baja' => $dateNow,
            'nuevo_ingreso_reingreso' => 'NUEVO INGRESO',
            'campamento' => 'CAMPAMENTO SIERRA LOS MOCHIS',
            'identificacion_oficial' => 'INE123412312',
            'curp' => 'CIAT9532321',
            'rfc' => 'CIAT9512312',
            'domicilio' => 'CALLE LOS ABEDULES EXT #34',
            'nss' => '12312412',
            'fecha_nacimiento' => $dateNow,
            'lugar_nacimiento' => 'ZACATECAS',
            'residencia' => 'ZACATECAS',
            'vacunas_covid' => 'SI',
            'licencia_conducir' => 'CHOFER TIPO A',
            'carta_antecedentes' => 'SI',
            'estado_civil' => 'DIVORCIADO',
            'nivel_estudios' => 'LICENCIATURA',
            'infonavit' => 'INFONAVIT1234',
            'fonacot' => 'FONACOT1234',
            'cuenta_bancaria' => '123456789',
            'contacto_emergencia' => 'PERLA CECILIA',
            'nombre_esposa' => 'PERLA CECILIA',
            'no_hijos' => 13,
            'persona_para_tramites' => 'CARLOS ALBERTO GUERRA DUEÑAS',
            'beneficiarios' => 'JOSE LUIS REYES MAURICIO',
            'porcentaje' => '100',
            'domicilio_real' => 'FRACCIONAMINETO BERNARDEZ #35',
            'domicilio_alterno' => 'FRACCIONAMIENTO TAHONA VALENCIA 122',
            'talla_camisa' => 'XL',
            'talla_pantalon' => 'XL',
            'talla_calzado' => '22.5',
            'enfermedades' => 'CORAZÓN',
            'cirugias' => 'TRANSPLANTE DE SENOS',
            'alergias' => 'CERVEZA',
            'lentes' => 'SI', 
            'lesiones' => 'LESION MEÑISCO RODILLA IZQUIERDA',
            'fumador' => 1,
            'practica_deporte' => 'SI',
            'pertenece_club_social' => 'SI',
            'pertenece_sindicato' => 'SI',
            'toma_medicamento' => 'ASPIRINA FORTE, FLANAX 500',
            'tipo_sangre' => 'A+',
            'peso' => '85',
            'estatura' => '1.83',
            'imc' => '30.5',
            'esta_trabajando' => 1,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
            
    }
}
