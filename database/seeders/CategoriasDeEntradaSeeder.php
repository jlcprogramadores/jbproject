<?php

namespace Database\Seeders;

use App\Models\CategoriasDeEntrada;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoriasDeEntradaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();
        
        CategoriasDeEntrada::create([
            'nombre' => 'No Seleccionado',
            'descripcion' => 'No Seleccionado',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasDeEntrada::create([
            'nombre' => 'CON CONTRATO',
            'descripcion' => 'Categoría de entrada de Ejemplo',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        CategoriasDeEntrada::create([
            'nombre' => 'SIN CONTRATO',
            'descripcion' => 'Categoría de entrada de Ejemplo',
            'es_activo' => 1,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
    }
}
