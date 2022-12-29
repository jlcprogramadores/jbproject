<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Candidato
 *
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
    protected $fillable = ['nombre','genero','telefono_personal','correo','curriculum','semaforo','usuario_edito'];



}
