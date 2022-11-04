<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_de_direccione_id');
            $table->foreign('tipo_de_direccione_id')
                ->references('id')
                ->on('tipo_de_direcciones');
            $table->integer('cliente_id')->nullable();
            $table->integer('proveedor_id')->nullable();
            $table->string('calle');
            $table->integer('num_int');
            $table->integer('num_ext');
            $table->integer('codigo_postal');
            $table->string('colonia');
            $table->string('municipio');
            $table->string('estado');
            $table->string('pais');
            $table->boolean('es_activo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direcciones');
    }
}
