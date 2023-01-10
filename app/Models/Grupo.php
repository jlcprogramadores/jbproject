<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Grupo
 *
 * @property $id
 * @property $nombre
 * @property $usuario_edito
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Grupo extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'usuario_edito' => 'required',
    ];

    protected $perPage = 1000000;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','usuario_edito'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paro()
    {
        return $this->hasMany('App\Models\Paro', 'grupo_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function grupoEmpleado()
    {
        return $this->hasMany('App\Models\GruposEmpleado', 'grupo_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function historialParo()
    {
        return $this->hasMany('App\Models\HistorialParo', 'grupo_id', 'id');
    }

}
