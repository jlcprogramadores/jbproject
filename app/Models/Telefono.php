<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Telefono
 *
 * @property $id
 * @property $cliente_id
 * @property $proveedor_id
 * @property $telefono
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Telefono extends Model
{
    static $rules = [
		'telefono' => 'required',
        'usuario_edito'  => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cliente_id','proveedor_id','telefono','usuario_edito'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\cliente', 'id', 'cliente_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proveedor()
    {
        return $this->hasOne('App\Models\Proveedore', 'id', 'proveedor_id');
    }
}
