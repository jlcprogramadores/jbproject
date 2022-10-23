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
    public $timestamps = false;
    static $rules = [
		'nombre' => 'required',
		'descripcion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entradas()
    {
        return $this->hasMany('App\Models\Entrada', 'tipodeingreso_id', 'id');
    }
    

}
