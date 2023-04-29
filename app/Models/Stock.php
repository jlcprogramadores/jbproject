<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Stock
 *
 * @property $id
 * @property $producto_id
 * @property $proveedor_id
 * @property $destino
 * @property $fecha
 * @property $lote
 * @property $cantidad
 * @property $numero_factura
 * @property $numero_documento
 * @property $created_at
 * @property $updated_at
 *
 * @property Producto $producto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Stock extends Model
{
    
    static $rules = [
		'producto_id' => 'required',
		'fecha' => 'required',
    ];

    protected $perPage = 1000000;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
      'producto_id',
      'proveedor_id',
      'destino',
      'fecha',
      'lote',
      'cantidad',
      'numero_factura',
      'numero_documento',
      'es_entrada',
      'usuario_edito'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'producto_id');
    }

    public function proveedor()
    {
        return $this->hasOne('App\Models\Proveedore', 'id', 'proveedor_id');
    }
    

}
