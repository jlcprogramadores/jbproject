<?php

namespace App\Exports;

use App\Models\Finanza;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class FianzasExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'No',
            'Fecha Entrada',
            'Fecha Salida',
            'Vence',
            'Fecha Vencimiento',
            'Días',
            'Estado',
            'Tipo I&E',
            'Fam & Cat',
            'Razón Social',
            'Proyecto',
            'Descripción',
            'Factora o Folio',
            'Proveedor o Cliente',
            'Cantidad & Unidad',
            'Costo Unitario',
            'Subtotal',
            'IVA',
            'Total',
            'Monto A Pagar',
            'Fecha De Pago',
            'Método de pago',
            'Estatus',
            'Entregado Material',
            'A Meses',
            'Fecha Facturación',
            'Comentario',
            'Comprobante',
        ];
    }
    
    public function collection()
    {
        return $finanzas = Finanza::select(
            'finanzas.no',
            DB::raw("DATE_FORMAT(finanzas.fecha_entrada, '%Y-%m-%d') as fecha_entrada"),
            DB::raw("DATE_FORMAT(finanzas.fecha_salida, '%Y-%m-%d') as fecha_salida"),
            'finanzas.vence',
            DB::raw("@fven := DATE_FORMAT(DATE_ADD(finanzas.fecha_salida, INTERVAL finanzas.vence DAY), '%Y-%m-%d') as fecha_vencimiento"),
            DB::raw("@dias := DATEDIFF(DATE_FORMAT(DATE_ADD(finanzas.fecha_salida, INTERVAL finanzas.vence DAY), '%Y-%m-%d'), NOW()) as dias"),
            DB::raw("if(DATEDIFF(DATE_FORMAT(DATE_ADD(finanzas.fecha_salida, INTERVAL finanzas.vence DAY), '%Y-%m-%d'), NOW())<= 0, 'Vencido', 'Por Vencer') as estado"),
            DB::raw("if(finanzas.entradas_id is not NULL,'Ingreso', 'Egreso') as tipo"),
            DB::raw("CONCAT(IF(familias.nombre IS NULL, '', CONCAT('F: ', familias.nombre,', ')), IF(categorias_familias.nombre IS NULL, '', CONCAT('C: ', categorias_familias.nombre))) AS fam_cat"),
            DB::raw("if(finanzas.salidas_id is not NULL, proveedores.razon_social, clientes.razon_social) as razon_social"),
            'proyectos.nombre as proyecto',
            'finanzas.descripcion as descripcion',

            DB::raw("(SELECT COALESCE(GROUP_CONCAT(fac.referencia_factura),if(finanzas.entradas_id is not NULL, 'No Facturado', 'No Recibido')) FROM facturas as fac WHERE fac.finanza_id = finanzas.id) as fac_o_fol"),
            DB::raw("if(finanzas.salidas_id is not NULL, proveedores.nombre, clientes.nombre) as provedor_cliente"), 
            DB::raw("CONCAT(finanzas.cantidad, ' ', unidades.nombre) as cantidad_unidad"),
            DB::raw("CONCAT('$', FORMAT(finanzas.costo_unitario, 2)) as costo_unitario"),
            DB::raw("CONCAT('$', FORMAT(((finanzas.costo_unitario * finanzas.cantidad)), 2)) as subtotal"),
            DB::raw("CONCAT(ivas.porcentaje, ' ', '%') as iva"),
            DB::raw("CONCAT('$', FORMAT(((finanzas.costo_unitario * finanzas.cantidad) * ivas.porcentaje), 2)) AS total"),
            DB::raw("CONCAT('$', FORMAT(finanzas.monto_a_pagar, 2)) as monto_pagar"),
            DB::raw("DATE_FORMAT(finanzas.fecha_de_pago, '%Y-%m-%d') as fecha_de_pago"),
            'finanzas.metodo_de_pago as metodo_pago',
            DB::raw("if(finanzas.es_pagado = 1, 'Pagado', 'Pendiente') as es_pagado"),
            'finanzas.entregado_material_a as entregado',
            DB::raw("if(finanzas.a_meses is not NULL, (SELECT GROUP_CONCAT(if(DATE_FORMAT(fac.mes_de_pago, '%Y-%m') = DATE_FORMAT(NOW(), '%Y-%m'), if(fac.monto is not NULL and fac.monto != 0, CONCAT('<span class=\"badge bg-success\">', DATE_FORMAT(fac.mes_de_pago, '%Y-%m'), ' ', 'Pagado</span>'), CONCAT('<span class=\"badge bg-warning text-dark\">', DATE_FORMAT(fac.mes_de_pago, '%Y-%m'), ' ', 'Por Vencer</span>')), if(fac.mes_de_pago < NOW(), if(fac.monto is not NULL and fac.monto != 0, '', CONCAT('<span class=\"badge bg-danger\">', DATE_FORMAT(fac.mes_de_pago, '%Y-%m'), ' ', 'Vencido</span>')), ''))) FROM facturas as fac WHERE fac.finanza_id = finanzas.id), 'N/A') as a_meses"),
            DB::raw("DATE_FORMAT(finanzas.fecha_facturacion, '%Y-%m-%d') as fecha_facturacion"),
            'finanzas.comentario',
            DB::raw("if(salidas.enviado = 1, 'Enviado', 'Sin Enviar') as comprobante"),
        )
        ->leftJoin('salidas', 'salidas.id', '=', 'finanzas.salidas_id')
        ->leftJoin('proveedores', 'proveedores.id', '=', 'salidas.proveedor_id')
        ->leftJoin('entradas', 'entradas.id', '=', 'finanzas.entradas_id')
        ->leftJoin('clientes', 'clientes.id', '=', 'entradas.cliente_id')
        ->leftJoin('proyectos', 'proyectos.id', '=', 'finanzas.proyecto_id')
        ->leftJoin('unidades', 'unidades.id', '=', 'finanzas.unidad_id')
        ->leftJoin('ivas', 'ivas.id', '=', 'finanzas.iva_id')
        ->leftJoin('categorias_familias', 'categorias_familias.id', '=', 'finanzas.categoria_id')
        ->leftJoin('familias', 'familias.id', '=', 'categorias_familias.id')
        ->get();
    }
}
