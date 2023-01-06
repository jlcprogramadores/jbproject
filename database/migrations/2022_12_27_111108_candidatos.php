<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Candidatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('candidatos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('genero');
            $table->bigInteger('telefono_personal');
            $table->string('correo');
            $table->string('curriculum')->nullable();
            $table->integer('puesto_id')->nullable();
            $table->string('comentario')->nullable();
            $table->integer('validacion_1')->nullable();    
            $table->integer('validacion_2')->nullable();  
            $table->integer('validacion_3')->nullable();  
            $table->string('usuario_edito');
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
        Schema::dropIfExists('candidatos');
    }
}
