<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Destino
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Destino extends Model
{
    
    static $rules = [
		'nombre' => 'required',
    'usuario_edito'  => 'required',
    ];

    protected $perPage = 100000;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','usuario_edito'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function controlGasolinera()
    {
        return $this->hasMany('App\Models\ControlGasolinera', 'destino_id', 'id');
    }

}
