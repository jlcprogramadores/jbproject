<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Unidade
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Unidade extends Model
{
    // public $timestamps = false;
    static $rules = [
      'nombre' => 'required',
      'descripcion' => 'required',
      'usuario_edito'  => 'required',
    ];

    protected $perPage = 100000;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion','usuario_edito'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function finanza()
    {
        return $this->hasMany('App\Models\Finanza', 'unidad_id', 'id');
    }

}
