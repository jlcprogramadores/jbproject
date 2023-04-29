<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('razon_social')->nullable();
            $table->string('estado');
            $table->integer('dias_de_credito')->nullable();
            $table->decimal('monto_de_credito', 12, 2)->nullable();
            $table->boolean('es_facturable');
            $table->string('mail')->nullable();
            $table->string('rfc')->nullable();
            $table->boolean('es_activo');
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
        Schema::dropIfExists('proveedores');
    }
}
