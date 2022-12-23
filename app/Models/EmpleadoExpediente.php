<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EmpleadoExpediente
 *
 * @property $id
 * @property $empleado_id
 * @property $expediente_id
 * @property $archivo
 * @property $usuario_edito
 * @property $created_at
 * @property $updated_at
 *
 * @property Empleado $empleado
 * @property Expediente $expediente
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EmpleadoExpediente extends Model
{
    
    static $rules = [
		'empleado_id' => 'required',
		'usuario_edito' => 'required',
    ];

    protected $perPage = 1000000;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['empleado_id','expediente_id','archivo','usuario_edito'];


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
    public function expediente()
    {
        return $this->hasOne('App\Models\Expediente', 'id', 'expediente_id');
    }
    

}
