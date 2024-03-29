<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Factura
 *
 * @property $id
 * @property $finanza_id
 * @property $referencia_factura
 * @property $factura_base64
 * @property $url
 * @property $fecha_creacion
 * @property $fecha_factura
 * @property $monto
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Factura extends Model
{
    static $rules = [
		'referencia_factura' => 'required',
		'concepto' => 'required',
		'fecha_creacion' => 'required',
		'fecha_factura' => 'required',
    'usuario_edito'  => 'required',
    'monto'  => 'required',
    ];

    protected $perPage = 1000000;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
      'referencia_factura',
      'factura_base64',
      'url',
      'fecha_creacion',
      'fecha_factura',
      'finanza_id',
      'usuario_edito',
      'monto',
      'concepto',
      'comentario_pago',
      'mes_de_pago'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ingreso()
    {
        return $this->hasOne('App\Models\Finanza', 'id', 'finanza_id');
    }


}
