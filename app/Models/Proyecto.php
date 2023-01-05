<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Proyecto
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $numero_de_proyecto
 * @property $es_activo
 * @property $presupuesto
 * @property $margen
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Proyecto extends Model
{
    static $rules = [
		'nombre' => 'required',
		'descripcion' => 'required',
		'numero_de_proyecto' => 'required',
		'es_activo' => 'required',
        'presupuesto' => 'required',
        'margen' => 'required',
        'usuario_edito'  => 'required',
    ];

    protected $perPage = 1000000;
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion','numero_de_proyecto','mina_id','es_activo','presupuesto','margen','usuario_edito'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mina()
    {
        return $this->hasOne('App\Models\Mina', 'id', 'mina_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entrada()
    {
        return $this->hasMany('App\Models\Entrada', 'entrada_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function finanza()
    {
        return $this->hasMany('App\Models\Finanza', 'proyecto_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empleado()
    {
        return $this->hasMany('App\Models\Empleado', 'proyecto_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paro()
    {
        return $this->hasMany('App\Models\Paro', 'proyecto_id', 'id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function incidencia()
    {
        return $this->hasMany('App\Models\Incidencia', 'proyecto_id', 'id');
    }
}
