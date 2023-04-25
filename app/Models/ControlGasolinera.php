<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ControlGasolinera
 *
 * @property $id
 * @property $gasolinera_id
 * @property $destino_id
 * @property $folio
 * @property $ticket
 * @property $producto
 * @property $litros
 * @property $precio_unitario
 * @property $total
 * @property $fecha
 * @property $carga
 * @property $comentario
 * @property $folio_factura
 * @property $total_factura_neto
 * @property $es_pagado
 * @property $vale_archivo
 * @property $created_at
 * @property $updated_at
 *
 * @property Destino $destino
 * @property Gasolinera $gasolinera
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ControlGasolinera extends Model
{
    
    static $rules = [
		'gasolinera_id' => 'required',
		'destino_id' => 'required',
		'folio' => 'required',
		'ticket' => 'required',
		'producto' => 'required',
		'litros' => 'required',
		'precio_unitario' => 'required',
		'total' => 'required',
		'fecha' => 'required',
		'carga' => 'required',
		'total_factura_neto' => 'required',
		'es_pagado' => 'required',
        'usuario_edito'  => 'required',
    ];

    protected $perPage = 100000;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['gasolinera_id','destino_id','folio','ticket','producto','litros','precio_unitario','total','fecha','carga','comentario','folio_factura','total_factura_neto','es_pagado','vale_archivo','usuario_edito'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function destino()
    {
        return $this->hasOne('App\Models\Destino', 'id', 'destino_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function gasolinera()
    {
        return $this->hasOne('App\Models\Gasolinera', 'id', 'gasolinera_id');
    }
    

}
