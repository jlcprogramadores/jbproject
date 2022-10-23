<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CategoriasDeEntrada
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $es_activo
 *
 * @property Entrada[] $entradas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CategoriasDeEntrada extends Model
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
    public function entradas()
    {
        return $this->hasMany('App\Models\Entrada', 'categorias_de_entrada_id', 'id');
    }
    

}
