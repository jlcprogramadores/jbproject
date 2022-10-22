<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Proyecto
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $numero_de_proyecto
 * @property $es_activo
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Proyecto extends Model
{
    public $timestamps = false;
    static $rules = [
		'nombre' => 'required',
		'descripcion' => 'required',
		'numero_de_proyecto' => 'required',
		'es_activo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion','numero_de_proyecto','es_activo'];



}
