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
            'finanzas.costo_unitario',
            'ivas.porcentaje',
            'finanzas.monto_a_pagar',
            'finanzas.fecha_de_pago',
            'finanzas.metodo_de_pago',
            'finanzas.es_pagado',
            'finanzas.entregado_material_a',
            'finanzas.fecha_primer_pago',
            'finanzas.fecha_facturacion',
            'finanzas.comentario',
            'salidas.enviado',
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
            $query->where('f.no', $this->no);
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
