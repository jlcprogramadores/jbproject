<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
 * @property $retencion
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
	public $timestamps = false; 
    static $rules = [
		'proyecto_id' => 'required',
		'iva_id' => 'required',
		'no' => 'required',
        'vence' => 'required',
		'descripcion' => 'required',
		'cantidad' => 'required',
		'unidad_id' => 'required',
		'costo_unitario' => 'required',
		'retencion' => 'required',
		'monto_a_pagar' => 'required',
		'fecha_de_pago' => 'required',
		'metodo_de_pago' => 'required',
		'entregado_material_a' => 'required',
		'comentario' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['salidas_id','entradas_id','proyecto_id','categoria_id','iva_id','no','fecha_facturacion','fecha_salida','fecha_entrada','descripcion','cantidad','unidad_id','costo_unitario','retencion','monto_a_pagar','fecha_de_pago','metodo_de_pago','entregado_material_a','comentario','vence'];

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

}
