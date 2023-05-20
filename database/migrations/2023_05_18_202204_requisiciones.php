<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Requisiciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
    public function up()
    {
        Schema::create('requisiciones', function (Blueprint $table) {
            $table->id();
            $table->string('folio');
            $table->text('departamento');
            $table->text('proyecto');
            $table->text('justificacion');
            $table->text('archivo');
            $table->boolean('esta_aprobada');
            $table->text('aprobada_por')->nullable();
            $table->text('aprobada_en')->nullable();
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
        Schema::dropIfExists('requisiciones');
    }
}
