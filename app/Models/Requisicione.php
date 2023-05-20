<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Requisicione
 *
 * @property $id
 * @property $folio
 * @property $departamento
 * @property $proyecto
 * @property $justificacion
 * @property $archivo
 * @property $esta_aprobada
 * @property $aprobada_por
 * @property $aprobada_en
 * @property $usuario_edito
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Requisicione extends Model
{
    
    static $rules = [
		'folio' => 'required',
		'departamento' => 'required',
		'proyecto' => 'required',
		'justificacion' => 'required',
		'esta_aprobada' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['folio','departamento','proyecto','justificacion','archivo','esta_aprobada','aprobada_por','aprobada_en','usuario_edito'];



}
