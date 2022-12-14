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
    static $rules = [
        'usuario_edito'  => 'required',
    ];

    protected $perPage = 1000000;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['proveedor_id','usuario_edito','comprobante','enviado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proveedore()
    {
        return $this->hasOne('App\Models\Proveedore', 'id', 'proveedor_id');
    }
}
