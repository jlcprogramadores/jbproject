<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Mina
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $usuario_edito
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Mina extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'descripcion' => 'required',
		'usuario_edito' => 'required',
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
    public function proyectos()
    {
        return $this->hasMany('App\Models\Proyecto', 'mina_id', 'id');
    }
}
