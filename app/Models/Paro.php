<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Paro
 *
 * @property $id
 * @property $empleado_id
 * @property $proyecto_id
 * @property $puesto_id
 * @property $salario
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
		'empleado_id' => 'required',
		'proyecto_id' => 'required',
		'salario' => 'required',
		'usuario_edito' => 'required',
    ];

    protected $perPage = 1000000;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['empleado_id','proyecto_id','puesto_id','salario','fecha_inicio','fecha_fin','comentario','usuario_edito'];


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
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function puesto()
    {
        return $this->hasOne('App\Models\Puesto', 'id', 'puesto_id');
    }

}
