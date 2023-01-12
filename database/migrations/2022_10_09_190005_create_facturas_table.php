<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
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
            $table->string('referencia_factura');
            $table->longText('factura_base64')->nullable();
            $table->string('url')->nullable();
            $table->dateTime('fecha_creacion');
            $table->dateTime('fecha_factura');
            $table->decimal('monto', 12, 2);
            $table->string('concepto');
            $table->string('comentario')->nullable();
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
