<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Direccione
 *
 * @property $id
 * @property $tipo_de_direccione_id
 * @property $cliente_id
 * @property $proveedor_id
 * @property $calle
 * @property $num_int
 * @property $num_ext
 * @property $codigo_postal
 * @property $colonia
 * @property $municipio
 * @property $estado
 * @property $pais
 * @property $es_activo
 *
 * @property TipoDeDireccione $tipoDeDireccione
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Direccione extends Model
{
    static $rules = [
		'tipo_de_direccione_id' => 'required',
		'calle' => 'required',
		'num_int' => 'required',
		'codigo_postal' => 'required',
		'colonia' => 'required',
		'municipio' => 'required',
		'estado' => 'required',
		'pais' => 'required',
		'es_activo' => 'required',
        'usuario_edito'  => 'required',
    ];

    protected $perPage = 1000000;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_de_direccione_id','cliente_id','proveedor_id','calle','num_int','num_ext','codigo_postal','colonia','municipio','estado','pais','es_activo','usuario_edito'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipodedirecciones()
    {
        return $this->hasOne('App\Models\TipoDeDireccione', 'id', 'tipo_de_direccione_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'cliente_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proveedor()
    {
        return $this->hasOne('App\Models\Proveedore', 'id', 'proveedor_id');
    }
}
