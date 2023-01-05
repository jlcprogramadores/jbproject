<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Incidencia
 *
 * @property $id
 * @property $empleado_id
 * @property $proyecto_id
 * @property $fecha_inicio
 * @property $fecha_fin
 * @property $justificante
 * @property $comentario
 * @property $es_activo
 * @property $usuario_edito
 * @property $created_at
 * @property $updated_at
 *
 * @property Empleado $empleado
 * @property Proyecto $proyecto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Incidencia extends Model
{
    
    static $rules = [
		'empleado_id' => 'required',
		'proyecto_id' => 'required',
		'es_activo' => 'required',
		'usuario_edito' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['empleado_id','proyecto_id','fecha_inicio','fecha_fin','justificante','comentario','es_activo','usuario_edito'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empleado()
    {
        return $this->hasOne('App\Models\Empleado', 'id', 'empleado_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proyecto()
    {
        return $this->hasOne('App\Models\Proyecto', 'id', 'proyecto_id');
    }
    

}
