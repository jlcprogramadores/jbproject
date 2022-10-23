<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Salida
 *
 * @property $id
 * @property $proveedor_id
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Salida extends Model
{
    public $timestamps = false; 
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['proveedor_id'];



}
