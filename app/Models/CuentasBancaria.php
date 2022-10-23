<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CuentasBancaria
 *
 * @property $id
 * @property $proveedore_id
 * @property $banco
 * @property $titular_banco
 * @property $cuenta
 * @property $clabe
 * @property $tarjeta
 * @property $es_activo
 *
 * @property Proveedore $proveedore
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CuentasBancaria extends Model
{
    public $timestamps = false;
    static $rules = [
		'proveedore_id' => 'required',
		'banco' => 'required',
		'titular_banco' => 'required',
		'cuenta' => 'required',
		'es_activo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['proveedore_id','banco','titular_banco','cuenta','clabe','tarjeta','es_activo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proveedor()
    {
        return $this->hasOne('App\Models\Proveedore', 'id', 'proveedore_id');
    }
    

}
