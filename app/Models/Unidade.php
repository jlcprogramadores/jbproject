<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Unidade
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Unidade extends Model
{
    public $timestamps = false;
    static $rules = [
		'nombre' => 'required',
		'descripcion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion'];



}
