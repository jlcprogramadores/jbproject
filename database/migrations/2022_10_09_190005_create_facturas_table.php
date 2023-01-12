<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     * ya es posible hacer mas cosas null pero se tendra que manejar diferente los datos requeridos en cada operacion
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('finanza_id');
            $table->foreign('finanza_id')
                ->references('id')
                ->on('finanzas');
            $table->string('referencia_factura')->nullable();
            $table->longText('factura_base64')->nullable();
            $table->string('url')->nullable();
            $table->dateTime('fecha_creacion');
            $table->dateTime('fecha_factura')->nullable();
            $table->decimal('monto', 12, 2)->nullable();
            $table->string('concepto')->nullable();
            $table->string('comentario_pago')->nullable();
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
        Schema::dropIfExists('facturas');
    }
}
