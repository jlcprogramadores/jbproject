<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Archivo
 *
 * @property $id
 * @property $nombre
 * @property $url
 * @property $usuario_edito
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Archivo extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'url' => 'required',
		'usuario_edito' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','url','usuario_edito'];



}
