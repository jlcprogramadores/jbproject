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
    public $timestamps = false;
    static $rules = [
		'familia_id' => 'required',
		'nombre' => 'required',
		'descripcion' => 'required',
		'es_activo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['familia_id','nombre','descripcion','es_activo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function familia()
    {
        return $this->hasOne('App\Models\Familia', 'id', 'familia_id');
    }
    

}
