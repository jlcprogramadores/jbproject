<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Expediente
 *
 * @property $id
 * @property $nombre
 * @property $es_multiple
 * @property $usuario_edito
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Expediente extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'es_multiple' => 'required',
		'usuario_edito' => 'required',
    ];

    protected $perPage = 1000000;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','es_multiple','usuario_edito'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empleadoExpediente()
    {
        return $this->hasMany('App\Models\EmpleadoExpediente', 'expediente_id', 'id');
    }
    
}
