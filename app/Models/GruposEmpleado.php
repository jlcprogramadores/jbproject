<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GruposEmpleado
 *
 * @property $id
 * @property $grupo_id
 * @property $empleado_id
 * @property $puesto_id
 * @property $salario
 * @property $usuario_edito
 * @property $created_at
 * @property $updated_at
 *
 * @property Empleado $empleado
 * @property Grupo $grupo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class GruposEmpleado extends Model
{
    
    static $rules = [
		'grupo_id' => 'required',
		'empleado_id' => 'required',
		'usuario_edito' => 'required',
    ];

    protected $perPage = 1000000;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['grupo_id','empleado_id','puesto_id','salario','usuario_edito'];


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
    public function grupo()
    {
        return $this->hasOne('App\Models\Grupo', 'id', 'grupo_id');
    }
    

} 