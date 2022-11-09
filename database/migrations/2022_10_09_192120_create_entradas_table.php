<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')
                ->references('id')
                ->on('clientes');
            $table->unsignedBigInteger('tipodeingreso_id');
            $table->foreign('tipodeingreso_id')
                ->references('id')
                ->on('tipo_de_ingresos');
            $table->unsignedBigInteger('categorias_de_entrada_id');
            $table->foreign('categorias_de_entrada_id')
                ->references('id')
                ->on('categorias_de_entradas');       
            $table->integer('proyecto_id')->nullable();
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
        Schema::dropIfExists('entradas');
    }
}
