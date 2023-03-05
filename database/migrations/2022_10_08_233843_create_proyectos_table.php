<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id()->index();
            $table->integer('mina_id')->nullable();
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('numero_de_proyecto');
            $table->boolean('es_activo');
            $table->string('usuario_edito');
            $table->decimal('presupuesto', 12, 2);
            $table->decimal('margen', 12, 2);
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
        Schema::dropIfExists('proyectos');
    }
}
