<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinanzasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finanzas', function (Blueprint $table) {
            $table->id();
            $table->integer('salidas_id')->nullable();
            $table->integer('entradas_id')->nullable();
            $table->integer('categoria_id')->nullable();
            $table->integer('vence');
            $table->unsignedBigInteger('proyecto_id');
            $table->foreign('proyecto_id')
                ->references('id')
                ->on('proyectos');
            $table->integer('iva_id');
            $table->string('no');
            $table->dateTime('fecha_salida')->nullable();
            $table->dateTime('fecha_entrada')->nullable();
            $table->dateTime('fecha_facturacion')->nullable();
            $table->string('descripcion');
            $table->integer('cantidad');
            $table->integer('unidad_id');
            $table->decimal('costo_unitario', 12, 2);
            $table->decimal('monto_a_pagar', 12, 2);
            $table->dateTime('fecha_de_pago');
            $table->string('metodo_de_pago');
            $table->string('entregado_material_a');
            $table->string('comentario');
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
        Schema::dropIfExists('finanzas');
    }
}
