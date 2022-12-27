<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Candidato
 *
 * @property $apellido_materno
 * @property $apellido_paterno
 * @property $nombre
 * @property $genero
 * @property $telefono_personal
 * @property $correo
 * @property $curriculum
 * @property $semaforo
 * @property $usuario_edito
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Candidato extends Model
{
    
    static $rules = [
		'apellido_materno' => 'required',
		'apellido_paterno' => 'required',
		'nombre' => 'required',
		'genero' => 'required',
		'telefono_personal' => 'required',
		'correo' => 'required',
		'usuario_edito' => 'required',
    ];

    protected $perPage = 1000000;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['apellido_materno','apellido_paterno','nombre','genero','telefono_personal','correo','curriculum','semaforo','usuario_edito'];



}
