<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoDeDireccione
 *
 * @property $id
 * @property $nombre
 * @property $es_fiscal
 *
 * @property Direccione[] $direcciones
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TipoDeDireccione extends Model
{
    public $timestamps = false;  
    static $rules = [
		'nombre' => 'required',
		'es_fiscal' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','es_fiscal'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function direcciones()
    {
        return $this->hasMany('App\Models\Direccione', 'direcciones_id', 'id');
    }
}
