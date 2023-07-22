<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

/**
 * Class Finanza
 *
 * @property $id
 * @property $salidas_id
 * @property $entradas_id
 * @property $categoria_id
 * @property $iva_id
 * @property $proyecto_id
 * @property $no
 * @property $fecha_salida
 * @property $fecha_entrada
 * @property $fecha_facturacion
 * @property $descripcion
 * @property $cantidad
 * @property $unidad_id
 * @property $costo_unitario
 * @property $monto_a_pagar
 * @property $fecha_de_pago
 * @property $metodo_de_pago
 * @property $entregado_material_a
 * @property $comentario
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Finanza extends Model
{
    static $rulesIngreso = [
		'fecha_entrada' => 'required',
		'vence' => 'required',
		'familia_id' => 'required',
		'categoria_id' => 'required',
		'proyecto_id' => 'required',
		'descripcion' => 'required',
		'cliente_id' => 'required',
		'categorias_de_entrada_id' => 'required',
		'tipodeingreso_id' => 'required',
		'cantidad' => 'required',
		'unidad_id' => 'required',
		'costo_unitario' => 'required',
		'iva_id' => 'required',
		// 'fecha_facturacion' => 'required',
        'usuario_edito'  => 'required',
    ];
    static $rulesEgreso = [
		'proyecto_id' => 'required',
		'categoria_id' => 'required',
		'proveedor_id' => 'required',
        'fecha_entrada' => 'required',
		'iva_id' => 'required',
        'vence' => 'required',
		'cantidad' => 'required',
		'unidad_id' => 'required',
		'familia_id' => 'required',
		'costo_unitario' => 'required',
		'iva_id' => 'required',
		'entregado_material_a' => 'required',
        'usuario_edito'  => 'required',
		'descripcion' => 'required',

    ];
    static $rulesEgresoMeses = [
        'a_meses'  => 'required',
        'fecha_primer_pago'  => 'required',
		'proyecto_id' => 'required',
		'categoria_id' => 'required',
		'proveedor_id' => 'required',
        'fecha_entrada' => 'required',
		'iva_id' => 'required',
        'vence' => 'required',
		'cantidad' => 'required',
		'unidad_id' => 'required',
		'familia_id' => 'required',
		'costo_unitario' => 'required',
		'iva_id' => 'required',
		'entregado_material_a' => 'required',
        'usuario_edito'  => 'required',
		'descripcion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'salidas_id',
        'entradas_id',
        'proyecto_id',
        'categoria_id',
        'iva_id',
        'no',
        'fecha_facturacion',
        'fecha_salida',
        'fecha_entrada',
        'descripcion',
        'cantidad',
        'unidad_id',
        'costo_unitario',
        'monto_a_pagar',
        'fecha_de_pago',
        'metodo_de_pago',
        'entregado_material_a',
        'comentario',
        'vence',
        'usuario_edito',
        'es_pagado',
        'a_meses',
        'esta_atrasado',
        'fecha_primer_pago'
    ];

	/**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function entrada()
    {
        return $this->hasOne('App\Models\Entrada', 'id', 'entradas_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function salida()
    {
        return $this->hasOne('App\Models\Salida', 'id', 'salidas_id');
    }

	/**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proyecto()
    {
        return $this->hasOne('App\Models\Proyecto', 'id', 'proyecto_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function factura()
    {
        return $this->hasMany('App\Models\Factura', 'finanza_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function famCategoria()
    {
        return $this->hasOne('App\Models\CategoriasFamilia', 'id', 'categoria_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function unidad()
    {
        return $this->hasOne('App\Models\Unidade', 'id', 'unidad_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function iva()
    {
        return $this->hasOne('App\Models\Iva', 'id', 'iva_id');
    }
}
