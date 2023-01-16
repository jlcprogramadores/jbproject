<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HistorialParo
 *
 * @property $id
 * @property $paro_id
 * @property $grupo_id
 * @property $empleado_id
 * @property $puesto_id
 * @property $salario
 * @property $fecha_inicio
 * @property $fecha_fin
 * @property $nombre_grupo
 * @property $comentario
 * @property $usuario_edito
 * @property $created_at
 * @property $updated_at
 *
 * @property Empleado $empleado
 * @property Grupo $grupo
 * @property Paro $paro
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class HistorialParo extends Model
{
    
    static $rules = [
		'paro_id' => 'required',
		'grupo_id' => 'required',
		'empleado_id' => 'required',
		'fecha_inicio' => 'required',
		'fecha_fin' => 'required',
		'nombre_grupo' => 'required',
		'usuario_edito' => 'required',
    ];

    protected $perPage = 1000000;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['paro_id','grupo_id','empleado_id','puesto_id','salario','fecha_inicio','fecha_fin','nombre_grupo','comentario','usuario_edito'];


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
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paro()
    {
        return $this->hasOne('App\Models\Paro', 'id', 'paro_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function puesto()
    {
        return $this->hasOne('App\Models\Puesto', 'id', 'puesto_id');
    }
    

}
