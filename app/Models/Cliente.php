<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property $id
 * @property $nombre
 * @property $razon_social
 * @property $mail
 * @property $rfc
 * @property $es_activo
 *
 * @property Entrada[] $entradas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{
    public $timestamps = false;
    static $rules = [
		'nombre' => 'required',
		'razon_social' => 'required',
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
    protected $fillable = ['nombre','razon_social','mail','rfc','es_activo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entradas()
    {
        return $this->hasMany('App\Models\Entrada', 'cliente_id', 'id');
    }
    

}
