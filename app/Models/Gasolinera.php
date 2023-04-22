<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Gasolinera
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Gasolinera extends Model
{
    
    static $rules = [
		'nombre' => 'required',
    ];

    protected $perPage = 100000;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function controlGasolinera()
    {
        return $this->hasMany('App\Models\ControlGasolinera', 'gasolinera_id', 'id');
    }

}
