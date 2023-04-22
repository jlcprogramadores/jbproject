<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ControlGasolineras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_gasolineras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gasolinera_id');
            $table->foreign('gasolinera_id')
                ->references('id')
                ->on('gasolineras');
            $table->unsignedBigInteger('destino_id');
            $table->foreign('destino_id')
                ->references('id')
                ->on('destinos');
            $table->string('folio');
            $table->string('ticket');
            $table->string('producto');
            $table->decimal('litros', 12, 2);
            $table->decimal('precio_unitario', 12, 2);
            $table->decimal('total', 12, 2);
            $table->dateTime('fecha');
            $table->string('carga');
            $table->string('comentario');
            $table->string('folio_factura');
            $table->decimal('total_factura_neto', 12, 2);
            $table->boolean('es_pagado')->default(0);
            $table->string('vale_archivo');
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
        Schema::dropIfExists('control_gasolineras');
    }
}
