<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Factura
 *
 * @property $id
 * @property $referencia_factura
 * @property $factura_base64
 * @property $url
 * @property $fecha_creacion
 * @property $fecha_factura
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Factura extends Model
{
    public $timestamps = false; 
    static $rules = [
		'referencia_factura' => 'required',
		'fecha_creacion' => 'required',
		'fecha_factura' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['referencia_factura','factura_base64','url','fecha_creacion','fecha_factura'];



}
