<?php

namespace Database\Seeders;

use App\Models\Entrada;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EntradaSeeder extends Seeder
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

        Entrada::create([
            'cliente_id' => 3,
            'tipodeingreso_id' => 1,
            'categorias_de_entrada_id' => 1,
            'proyecto_id' => 1,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Entrada::create([
            'cliente_id' => 4,
            'tipodeingreso_id' => 1,
            'categorias_de_entrada_id' => 1,
            'proyecto_id' => 2,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Entrada::create([
            'cliente_id' => 5,
            'tipodeingreso_id' => 1,
            'categorias_de_entrada_id' => 1,
            'proyecto_id' => 3,
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
    }
}
