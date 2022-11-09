<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Iva
 *
 * @property $id
 * @property $porcentaje
 * @property $descripcion
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Iva extends Model
{
    static $rules = [
		'porcentaje' => 'required',
		'descripcion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['porcentaje','descripcion'];



}
