<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Paro
 *
 * @property $id
 * @property $grupo_id
 * @property $proyecto_id
 * @property $fecha_inicio
 * @property $fecha_fin
 * @property $comentario
 * @property $usuario_edito
 * @property $created_at
 * @property $updated_at
 *
 * @property Empleado $empleado
 * @property Proyecto $proyecto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Paro extends Model
{
    
    static $rules = [
		'grupo_id' => 'required',
		'proyecto_id' => 'required',
    ];

    protected $perPage = 1000000;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['grupo_id','proyecto_id','fecha_inicio','fecha_fin','comentario','usuario_edito'];
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proyecto()
    {
        return $this->hasOne('App\Models\Proyecto', 'id', 'proyecto_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function grupo()
    {
        return $this->hasOne('App\Models\Grupo', 'id', 'grupo_id');
    }
}
