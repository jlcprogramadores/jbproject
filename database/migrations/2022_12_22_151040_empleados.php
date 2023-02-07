<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Empleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->longText('fotografia')->nullable();
            $table->integer('proyecto_id')->nullable();
            $table->integer('puesto_id')->nullable();
            $table->integer('no_empleado');
            $table->dateTime('fecha_no_empleado');
            $table->string('nombre');
            $table->string('genero');
            $table->bigInteger('telefono_personal');
            $table->string('correo');
            $table->decimal('salario_imss', 12, 2)->nullable();
            $table->decimal('salario_real', 12, 2)->nullable();
            $table->string('tipo_de_empleado')->nullable();
            $table->string('evaluaciones')->nullable();
            $table->string('dc3')->nullable();
            $table->string('clims')->nullable();
            $table->dateTime('fecha_ingreso')->nullable();
            $table->dateTime('fecha_baja')->nullable();
            $table->string('nuevo_ingreso_reingreso')->nullable();
            $table->string('campamento')->nullable();
            $table->string('identificacion_oficial')->nullable();
            $table->string('curp')->nullable();
            $table->string('rfc')->nullable();
            $table->string('domicilio')->nullable();
            $table->integer('nss')->nullable();
            $table->dateTime('fecha_nacimiento')->nullable();
            $table->string('lugar_nacimiento')->nullable();
            $table->string('residencia')->nullable();
            $table->string('vacunas_covid')->nullable();
            $table->string('licencia_conducir')->nullable();
            $table->string('carta_antecedentes')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('nivel_estudios')->nullable();
            $table->string('infonavit')->nullable();
            $table->string('fonacot')->nullable();
            $table->string('cuenta_bancaria')->nullable();
            $table->string('contacto_emergencia')->nullable();
            $table->string('nombre_esposa')->nullable();
            $table->integer('no_hijos')->nullable();
            $table->string('persona_para_tramites')->nullable();
            $table->string('beneficiarios')->nullable();
            $table->string('porcentaje')->nullable();
            $table->string('domicilio_real')->nullable();
            $table->string('domicilio_alterno')->nullable();
            $table->string('talla_camisa')->nullable();
            $table->string('talla_pantalon')->nullable();   
            $table->string('talla_calzado')->nullable();
            $table->string('enfermedades')->nullable();
            $table->string('cirugias')->nullable();
            $table->string('alergias')->nullable();
            $table->string('lentes')->nullable();
            $table->string('lesiones')->nullable();
            $table->boolean('fumador')->nullable();
            $table->string('practica_deporte')->nullable();
            $table->string('pertenece_club_social')->nullable();
            $table->string('pertenece_sindicato')->nullable();
            $table->string('toma_medicamento')->nullable();
            $table->string('tipo_sangre')->nullable();
            $table->decimal('peso', 12, 2)->nullable();
            $table->decimal('estatura', 12, 2)->nullable();
            $table->decimal('imc', 12, 2)->nullable();
            $table->boolean('esta_trabajando')->nullable();
            $table->dateTime('fecha_limite_expediente')->nullable();
            $table->string('usuario_edito');
            $table->longText('contrato')->nullable();
            $table->dateTime('fecha_inicio_contrato')->nullable();
            $table->dateTime('fecha_fin_contrato')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
