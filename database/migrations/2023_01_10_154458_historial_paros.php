<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HistorialParos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_paros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paro_id');
            $table->foreign('paro_id')
                ->references('id')
                ->on('paros');
            $table->unsignedBigInteger('grupo_id');
            $table->foreign('grupo_id')
                ->references('id')
                ->on('grupos');
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id')
                ->references('id')
                ->on('empleados');
            $table->unsignedBigInteger('puesto_id');
            $table->foreign('puesto_id')
                ->references('id')
                ->on('puestos');
            $table->decimal('salario', 12, 2)->nullable();
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->string('nombre_paro');
            $table->string('nombre_grupo');
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
        Schema::dropIfExists('historial_paros');
    }
}
