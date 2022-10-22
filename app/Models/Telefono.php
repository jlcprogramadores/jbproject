<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Telefono
 *
 * @property $id
 * @property $cliente_id
 * @property $proveedor_id
 * @property $telefono
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Telefono extends Model
{
    public $timestamps = false;   
    static $rules = [
		'telefono' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cliente_id','proveedor_id','telefono'];



}
