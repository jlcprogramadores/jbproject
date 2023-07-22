<?php

namespace App\Http\Livewire;

use App\Models\Finanza;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

use App\Exports\FianzasExport;
use Maatwebsite\Excel\Facades\Excel;

class FinanzaTabla extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $perPage = 10;
    public $orderBy = 'id';
    public $orderAsc = true;
    // nombres de los inputs
    public $no = '';
    public $fecha_entrada = '';
    public $fecha_salida = '';
    public $vence = '';

    public $fecha_vencimiento = '';
    public $dias = '';
    public $estado = '';
    public $tipo = '';
    public $fam_cat = '';
    public $razon_social = '';
    public $proyecto = '';
    public $descripcion = '';
    public $factura_folio = '';

    public $provedor_cliente = '';
    public $cantidad_unidad = '';
    public $costo_unitario = '';
    public $subtotal = '';
    public $iva = '';
    public $total = '';
    public $monto_pagar = '';
    public $fecha_pago = '';
    public $metodo_pago = '';
    public $estatus = '';
    public $entregado = '';
    public $a_meses = '';
    public $fecha_facturacion = '';
    public $comentario = '';
    public $comprobante = '';

    public function export()
    {
        return Excel::download(new FianzasExport, 'Fianzas.xlsx');
    }

    public function render(){
        $finanzas = Finanza::select(
            'finanzas.id',
            'finanzas.no',
            DB::raw("DATE_FORMAT(finanzas.fecha_entrada, '%Y-%m-%d') as fecha_entrada"),
            DB::raw("DATE_FORMAT(finanzas.fecha_salida, '%Y-%m-%d') as fecha_salida"),
            'finanzas.vence',
            DB::raw("@fven := DATE_FORMAT(DATE_ADD(finanzas.fecha_salida, INTERVAL finanzas.vence DAY), '%Y-%m-%d') as fecha_vencimiento"),
            DB::raw("@dias := DATEDIFF(DATE_FORMAT(DATE_ADD(finanzas.fecha_salida, INTERVAL finanzas.vence DAY), '%Y-%m-%d'), NOW()) as dias"),
            DB::raw("if(DATEDIFF(DATE_FORMAT(DATE_ADD(finanzas.fecha_salida, INTERVAL finanzas.vence DAY), '%Y-%m-%d'), NOW())<= 0, 'Vencido', 'Por Vencer') as estado"),
            DB::raw("if(finanzas.entradas_id is not NULL, 'Ingreso', 'Egreso') as tipo"),
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
            $query->having('no', 'like', '%' . $this->no . '%');
        })
        ->when($this->fecha_entrada, function ($query) {
            $query->having('fecha_entrada', 'like', '%' . $this->fecha_entrada . '%');
        })
        ->when($this->fecha_salida, function ($query) {
            $query->having('fecha_salida', 'like', '%' . $this->fecha_salida . '%');
        })
        ->when($this->vence, function ($query) {
            $query->having('vence', 'like', '%' . $this->vence . '%');
        })
        ->when($this->fecha_vencimiento, function ($query) {
            $query->having('fecha_vencimiento', 'like', '%' . $this->fecha_vencimiento . '%');
        })
        ->when($this->dias, function ($query) {
            $query->having('dias', 'like', '%' . $this->dias . '%');
        })
        ->when($this->estado, function ($query) {
            $query->having('estado', 'like', '%' . $this->estado . '%');
        })
        ->when($this->tipo, function ($query) {
            $query->having('tipo', 'like', '%' . $this->tipo . '%');
        })
        ->when($this->fam_cat, function ($query) {
            $query->having('fam_cat', 'like', '%' . $this->fam_cat . '%');
        })
        ->when($this->razon_social, function ($query) {
            $query->having('razon_social', 'like', '%' . $this->razon_social . '%');
        })
        ->when($this->proyecto, function ($query) {
            $query->having('proyecto', 'like', '%' . $this->proyecto . '%');
        })
        ->when($this->descripcion, function ($query) {
            $query->having('descripcion', 'like', '%' . $this->descripcion . '%');
        })
        ->when($this->factura_folio, function ($query) {
            $query->having('fac_o_fol', 'like', '%' . $this->factura_folio . '%');
        })
        ->when($this->provedor_cliente, function ($query) {
            $query->having('provedor_cliente', 'like', '%' . $this->provedor_cliente . '%');
        })
        ->when($this->cantidad_unidad, function ($query) {
            $query->having('cantidad_unidad', 'like', '%' . $this->cantidad_unidad . '%');
        })
        ->when($this->costo_unitario, function ($query) {
            $query->having('costo_unitario', 'like', '%' . $this->costo_unitario . '%');
        })
        ->when($this->subtotal, function ($query) {
            $query->having('subtotal', 'like', '%' . $this->subtotal . '%');
        })
        ->when($this->iva, function ($query) {
            $query->having('iva', 'like', '%' . $this->iva . '%');
        })
        ->when($this->total, function ($query) {
            $query->having('total', 'like', '%' . $this->total . '%');
        })
        ->when($this->monto_pagar, function ($query) {
            $query->having('monto_pagar', 'like', '%' . $this->monto_pagar . '%');
        })
        ->when($this->metodo_pago, function ($query) {
            $query->having('metodo_pago', 'like', '%' . $this->metodo_pago . '%');
        })
        ->when($this->estatus, function ($query) {
            $query->having('estatus', 'like', '%' . $this->estatus . '%');
        })
        ->when($this->entregado, function ($query) {
            $query->having('entregado', 'like', '%' . $this->entregado . '%');
        })
        ->when($this->a_meses, function ($query) {
            $query->having('a_meses', 'like', '%' . $this->a_meses . '%');
        })
        ->when($this->comentario, function ($query) {
            $query->having('comentario', 'like', '%' . $this->comentario . '%');
        })
        ->when($this->comprobante, function ($query) {
            $query->having('comprobante', 'like', '%' . $this->comprobante . '%');
        })
        
        ->orderBy( $this->orderBy, $this->orderAsc ? 'asc' : 'desc')
        ->paginate($this->perPage);
        return view('livewire.finanza-tabla', compact('finanzas'))
            ->with('i', ($finanzas->currentPage() - 1) * $finanzas->perPage());
    }
}
