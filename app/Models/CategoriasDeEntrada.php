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
    static $rules = [
		'nombre' => 'required',
		'descripcion' => 'required',
		'es_activo' => 'required',
    'usuario_edito'  => 'required',
    ];

    protected $perPage = 1000000;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion','es_activo','usuario_edito'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entradas()
    {
        return $this->hasMany('App\Models\Entrada', 'categorias_de_entrada_id', 'id');
    }
    

}
