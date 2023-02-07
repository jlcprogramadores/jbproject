<?php

namespace Database\Seeders;

use App\Models\Acceso;
use Carbon\Carbon;
use Illuminate\Database\Seeder;


class AccesoSeeder extends Seeder
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

        Acceso::create([
            'valor' => 'ejemploclave',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
    }
}
