<?php

namespace Database\Seeders;

use App\Models\Iva;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class IvaSeeder extends Seeder
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

        Iva::create([
            'porcentaje' => 0,
            'descripcion' => 'Iva de Ejemplo',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Iva::create([
            'porcentaje' => 1.0,
            'descripcion' => 'Iva de Ejemplo',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Iva::create([
            'porcentaje' => 1.16,
            'descripcion' => 'Iva de Ejemplo',
            'usuario_edito' => 'Administrador ',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
    }
}
