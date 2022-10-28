<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Proveedore
 *
 * @property $id
 * @property $nombre
 * @property $razon_social
 * @property $estado
 * @property $dias_de_credito
 * @property $monto_de_credito
 * @property $es_facturable
 * @property $mail
 * @property $rfc
 * @property $es_activo
 *
 * @property CuentasBancaria[] $cuentasBancarias
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Proveedore extends Model
{
    public $timestamps = false; 
    static $rules = [
		'nombre' => 'required',
		'razon_social' => 'required',
		'estado' => 'required',
		'dias_de_credito' => 'required',
		'monto_de_credito' => 'required',
		'es_facturable' => 'required',
		'mail' => 'required',
		'rfc' => 'required',
		'es_activo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','razon_social','estado','dias_de_credito','monto_de_credito','es_facturable','mail','rfc','es_activo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cuentasBancarias()
    {
        return $this->hasMany('App\Models\CuentasBancaria', 'proveedore_id', 'id');
    }
    
   /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function telefono()
    {
        return $this->hasMany('App\Models\Telefono', 'telefono_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salida()
    {
        return $this->hasMany('App\Models\Salida', 'salida_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function direcciones()
    {
        return $this->hasMany('App\Models\Direccione', 'proveedor_id', 'id');
    }

}
