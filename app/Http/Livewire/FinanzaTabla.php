<?php

namespace App\Http\Livewire;

use App\Models\Finanza;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;


class FinanzaTabla extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $orderBy = 'id';
    public $orderAsc = true;
    // nombres de los inputs
    public $no = '';
    public $fecha_entrada = '';
    public $fecha_salida = '';
    public $vence = '';

    public function render()
{
    $finanzas = Finanza::select(
            'finanzas.no',
            DB::raw("DATE_FORMAT(finanzas.fecha_entrada, '%Y-%m-%d') as fecha_entrada"),
            DB::raw("DATE_FORMAT(finanzas.fecha_salida, '%Y-%m-%d') as fecha_salida"),
            'finanzas.vence',
            DB::raw("@fven := DATE_FORMAT(DATE_ADD(finanzas.fecha_salida, INTERVAL finanzas.vence DAY), '%Y-%m-%d') as fecha_vencimiento"),
            DB::raw("@dias := DATEDIFF(@fven, NOW()) as dias"),
            DB::raw("if(@dias <= 0, 'Vencido', 'Por Vencer') as estado"),
            DB::raw("if(finanzas.entradas_id is not NULL, 'Egreso', 'Ingreso') as tipo"),
            'finanzas.entradas_id',
            'categorias_familias.nombre as cf_nombre',
            'familias.nombre as fam_nombre',
            'proveedores.razon_social as p_razon',
            'clientes.razon_social as c_razon',
            'proyectos.nombre as proyecto',
            'finanzas.descripcion as descripcion',
            DB::raw("(SELECT GROUP_CONCAT(fac.referencia_factura) FROM facturas as fac WHERE fac.finanza_id = finanzas.id) as fac_o_fol"),
            'finanzas.id',
            'proveedores.nombre as pro_nombre',
            'clientes.nombre as cli_nombre',
            DB::raw("CONCAT(finanzas.cantidad, ' ', unidades.nombre) as cantidad_unidad"),
            DB::raw("CONCAT('$', FORMAT(finanzas.costo_unitario, 2)) as costo_unitario"),
            DB::raw("CONCAT('$', FORMAT((@subtotal := (finanzas.costo_unitario * finanzas.cantidad)), 2)) as subtotal_total_mxn"),
            DB::raw("CONCAT(ivas.porcentaje, ' ', '%') as iva"),
            DB::raw("CONCAT('$', FORMAT((@subtotal * ivas.porcentaje), 2)) AS total_mxn"),
            DB::raw("CONCAT('$', FORMAT(finanzas.monto_a_pagar, 2)) as monto_a_pagar"),
            DB::raw("DATE_FORMAT(finanzas.fecha_de_pago, '%Y-%m-%d') as fecha_de_pago"),
            'finanzas.metodo_de_pago',
            DB::raw("if(finanzas.es_pagado = 0, 'Pagado', 'Pendiente') as estatus"),
            'finanzas.entregado_material_a',
            DB::raw("if(finanzas.a_meses is not NULL, (SELECT GROUP_CONCAT(if(DATE_FORMAT(fac.mes_de_pago, '%Y-%m') = DATE_FORMAT(NOW(), '%Y-%m'), if(fac.monto is not NULL and fac.monto != 0, CONCAT('<span class=\"badge bg-success\">', DATE_FORMAT(fac.mes_de_pago, '%Y-%m'), ' ', 'Pagado</span>'), CONCAT('<span class=\"badge bg-warning text-dark\">', DATE_FORMAT(fac.mes_de_pago, '%Y-%m'), ' ', 'Por Vencer</span>')), if(fac.mes_de_pago < NOW(), if(fac.monto is not NULL and fac.monto != 0, '', CONCAT('<span class=\"badge bg-danger\">', DATE_FORMAT(fac.mes_de_pago, '%Y-%m'), ' ', 'Vencido</span>')), ''))) FROM facturas as fac WHERE fac.finanza_id = finanzas.id), 'N/A') as a_meses"),
            DB::raw("DATE_FORMAT(finanzas.fecha_facturacion, '%Y-%m-%d') as fecha_facturacion"),
            'finanzas.comentario',
            DB::raw("if(salidas.enviado = 1, 'Enviado', 'Sin Enviar') as comprobante"),
            'finanzas.usuario_edito',
            'finanzas.updated_at'
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
        ->when($this->no, function ($query) {
            $query->where('finanzas.no', $this->no);
        })
        ->when($this->fecha_entrada, function ($query) {
            $query->where('finanzas.fecha_entrada', 'like', '%' . $this->fecha_entrada . '%');
        })
        ->when($this->fecha_salida, function ($query) {
            $query->where('finanzas.fecha_salida', 'like', '%' . $this->fecha_salida . '%');
        })
        ->when($this->vence, function ($query) {
            $query->where('finanzas.vence', 'like', '%' . $this->vence . '%');
        })
        ->orderBy('finanzas.' . $this->orderBy, $this->orderAsc ? 'asc' : 'desc')
        ->paginate($this->perPage);
    return view('livewire.finanza-tabla', compact('finanzas'))
        ->with('i', ($finanzas->currentPage() - 1) * $finanzas->perPage());
}
}
