<?php

namespace Database\Seeders;

use App\Models\Salida;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SalidaSeeder extends Seeder
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

        Salida::create([
            'proveedor_id' => 1,
            'usuario_edito' => 'Administrador ',
            'comprobante' => null,
            'enviado' => 0,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Salida::create([
            'proveedor_id' => 2,
            'usuario_edito' => 'Administrador ',
            'comprobante' => null,
            'enviado' => 0,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Salida::create([
            'proveedor_id' => 9,
            'usuario_edito' => 'Administrador ',
            'comprobante' => null,
            'enviado' => 0,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
    }
}
