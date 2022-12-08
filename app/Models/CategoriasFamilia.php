<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CategoriasFamilia
 *
 * @property $id
 * @property $familia_id
 * @property $nombre
 * @property $descripcion
 * @property $es_activo
 *
 * @property Familia $familia
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CategoriasFamilia extends Model
{
    static $rules = [
		'familia_id' => 'required',
		'nombre' => 'required',
		'descripcion' => 'required',
		'es_activo' => 'required',
    'usuario_edito'  => 'required',   
    ];

    protected $perPage = 10000;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['familia_id','nombre','descripcion','es_activo','usuario_edito'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function familia()
    {
        return $this->hasOne('App\Models\Familia', 'id', 'familia_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function finanza()
    {
        return $this->hasMany('App\Models\Finanza', 'categoria_id', 'id');
    }

}
