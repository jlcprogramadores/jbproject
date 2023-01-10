<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HistorialAlta
 *
 * @property $id
 * @property $empleado_id
 * @property $tipo
 * @property $comentario
 * @property $usuario_edito
 * @property $created_at
 * @property $updated_at
 *
 * @property Empleado $empleado
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class HistorialAlta extends Model
{
    
    static $rules = [
		'empleado_id' => 'required',
		'tipo' => 'required',
		'usuario_edito' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['empleado_id','tipo','comentario','usuario_edito'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empleado()
    {
        return $this->hasOne('App\Models\Empleado', 'id', 'empleado_id');
    }
    

}
