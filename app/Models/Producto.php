<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $codigo
 * @property $descripcion
 * @property $marca
 * @property $modelo
 * @property $precio_unitario
 * @property $minimo
 * @property $maximo
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    
    static $rules = [
		'codigo' => 'required',
		'descripcion' => 'required',
		'marca' => 'required',
		'modelo' => 'required',
		'precio_unitario' => 'required',
		'minimo' => 'required',
		'maximo' => 'required',
    ];

    protected $perPage = 1000000;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo','descripcion','marca','modelo','precio_unitario','minimo','maximo','usuario_edito', 'stock','rango_semaforo'];



}
