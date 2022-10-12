<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Familia
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $es_activo
 *
 * @property CategoriasFamilia[] $categoriasFamilias
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Familia extends Model
{
    public $timestamps = false;
    static $rules = [
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
    protected $fillable = ['nombre','descripcion','es_activo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categoriasFamilias()
    {
        return $this->hasMany('App\Models\CategoriasFamilia', 'familia_id', 'id');
    }
    

}
