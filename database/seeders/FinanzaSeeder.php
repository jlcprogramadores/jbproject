<?php

namespace Database\Seeders;

use App\Models\Finanza;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FinanzaSeeder extends Seeder
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

        //EGRESOS
        Finanza::create([
            'salidas_id' => 1,
            'entradas_id' => null,
            'categoria_id' => 26,
            'vence' => 5,
            'proyecto_id' => 1,
            'iva_id' => 2,
            'no' => 1,
            'fecha_salida' => $dateNow,
            'fecha_entrada' => $dateNow,
            'fecha_facturacion' => null,
            'descripcion' => 'Finanza de Prueba',
            'cantidad' => 10,
            'unidad_id' => 1,
            'costo_unitario' => 185.50,
            'monto_a_pagar' => 2151.80,
            'fecha_de_pago' => $dateNow,
            'metodo_de_pago' => 'Efectivo',
            'entregado_material_a' => 'Al dueño de mendez serrano',
            'comentario' => 'Comentario de Prueba',
            'a_meses' => null,
            'usuario_edito' => 'Administrador',
            'es_pagado' => 0,
            'esta_atrasado' => 0,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Finanza::create([
            'salidas_id' => 2,
            'entradas_id' => null,
            'categoria_id' => 2,
            'vence' =>12,
            'proyecto_id' => 2,
            'iva_id' => 1,
            'no' => 2,
            'fecha_salida' => $dateNow,
            'fecha_entrada' => $dateNow,
            'fecha_facturacion' => null,
            'descripcion' => 'Finanza de Prueba dos',
            'cantidad' => 10,
            'unidad_id' => 1,
            'costo_unitario' => 2500,
            'monto_a_pagar' => 25000,
            'fecha_de_pago' => $dateNow,
            'metodo_de_pago' => 'Transferencia',
            'entregado_material_a' => 'N/A',
            'comentario' => 'Comentario de Prueba dos',
            'a_meses' => null,
            'usuario_edito' => 'Administrador',
            'es_pagado' => 0,
            'esta_atrasado' => 0,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Finanza::create([
            'salidas_id' => 3,
            'entradas_id' => null,
            'categoria_id' => 26,
            'vence' =>3,
            'proyecto_id' => 2,
            'iva_id' => 1,
            'no' => 3,
            'fecha_salida' => $dateNow,
            'fecha_entrada' => $dateNow,
            'fecha_facturacion' => null,
            'descripcion' => 'Finanza de Prueba tres',
            'cantidad' => 6,
            'unidad_id' => 1,
            'costo_unitario' => 30000,
            'monto_a_pagar' => 180000,
            'fecha_de_pago' => $dateNow,
            'metodo_de_pago' => 'Efectivo',
            'entregado_material_a' => 'Al empleado de Walmart',
            'comentario' => 'Comentario de Prueba tres',
            'a_meses' => null,
            'usuario_edito' => 'Administrador',
            'es_pagado' => 0,
            'esta_atrasado' => 0,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        //INGRESOS
        Finanza::create([
            'salidas_id' => null,
            'entradas_id' => 1,
            'categoria_id' => 35,
            'vence' => 13,
            'proyecto_id' => 1,
            'iva_id' => 2,
            'no' => 4,
            'fecha_salida' => null,
            'fecha_entrada' => $dateNow,
            'fecha_facturacion' => $dateNow,
            'descripcion' => 'Prueba Ingreso',
            'cantidad' => 1,
            'unidad_id' => 1,
            'costo_unitario' => 150000,
            'monto_a_pagar' => 174000,
            'fecha_de_pago' => $dateNow,
            'metodo_de_pago' => 'Transferencia',
            'entregado_material_a' => 'N/A',
            'comentario' => 'Comentario Ingreso',
            'a_meses' => null,
            'usuario_edito' => 'Administrador',
            'es_pagado' => 0,
            'esta_atrasado' => 0,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Finanza::create([
            'salidas_id' => null,
            'entradas_id' => 2,
            'categoria_id' => 35,
            'vence' => 6,
            'proyecto_id' => 2,
            'iva_id' => 2,
            'no' => 5,
            'fecha_salida' => null,
            'fecha_entrada' => $dateNow,
            'fecha_facturacion' => $dateNow,
            'descripcion' => 'Prueba Ingreso dos',
            'cantidad' => 1,
            'unidad_id' => 1,
            'costo_unitario' => 300000,
            'monto_a_pagar' => 348000,
            'fecha_de_pago' => $dateNow,
            'metodo_de_pago' => 'Transferencia',
            'entregado_material_a' => 'N/A',
            'comentario' => 'Comentario Ingreso',
            'a_meses' => null,
            'usuario_edito' => 'Administrador',
            'es_pagado' => 0,
            'esta_atrasado' => 0,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);

        Finanza::create([
            'salidas_id' => null,
            'entradas_id' => 3,
            'categoria_id' => 35,
            'vence' => 1,
            'proyecto_id' => 3,
            'iva_id' => 2,
            'no' => 6,
            'fecha_salida' => null,
            'fecha_entrada' => $dateNow,
            'fecha_facturacion' => $dateNow,
            'descripcion' => 'Prueba Ingreso tres',
            'cantidad' => 1,
            'unidad_id' => 1,
            'costo_unitario' => 450000,
            'monto_a_pagar' => 522000,
            'fecha_de_pago' => $dateNow,
            'metodo_de_pago' => 'Transferencia',
            'entregado_material_a' => 'N/A',
            'comentario' => 'Comentario Ingreso',
            'a_meses' => null,
            'usuario_edito' => 'Administrador',
            'es_pagado' => 0,
            'esta_atrasado' => 0,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
    }
}
