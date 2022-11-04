<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentasBancariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas_bancarias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proveedore_id');
            $table->foreign('proveedore_id')
                ->references('id')
                ->on('proveedores');
            $table->string('banco');
            $table->string('titular_banco');
            $table->integer('cuenta');
            $table->integer('clabe')->nullable();
            $table->integer('tarjeta')->nullable();
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
        Schema::dropIfExists('cuentas_bancarias');
    }
}
