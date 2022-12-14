<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoDeIngreso
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 *
 * @property Entrada[] $entradas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TipoDeIngreso extends Model
{
    static $rules = [
		'nombre' => 'required',
		'descripcion' => 'required',
    'usuario_edito'  => 'required',
    ];

    protected $perPage = 1000000;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion','usuario_edito'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entradas()
    {
        return $this->hasMany('App\Models\Entrada', 'tipodeingreso_id', 'id');
    }
    

}
