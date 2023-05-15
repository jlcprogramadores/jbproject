<?php

namespace Database\Seeders;

use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();

        Producto::create([
            'codigo' => 'T1',
            'descripcion' => 'Taladro',
            'marca' => 'Truper',
            'modelo' => 'Tr1',
            'precio_unitario' => 2050,
            'minimo' => 7,
            'maximo' => 12,
            'stock' => 0,
            'rango_semaforo' => 2,
            'usuario_edito' => 'Carlos',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        Producto::create([
            'codigo' => 'T2',
            'descripcion' => 'Destornillador',
            'marca' => 'Truper',
            'modelo' => 'Tr2',
            'precio_unitario' => 1500,
            'minimo' => 5,
            'maximo' => 15,
            'stock' => 0,
            'rango_semaforo' => 2,
            'usuario_edito' => 'Carlos',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        Producto::create([
            'codigo' => 'T3',
            'descripcion' => 'Pulidora',
            'marca' => 'Truper',
            'modelo' => 'Tr3',
            'precio_unitario' => 900,
            'minimo' => 1,
            'maximo' => 3,
            'stock' => 0,
            'rango_semaforo' => 2,
            'usuario_edito' => 'Carlos',
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
        
    
    }
}
