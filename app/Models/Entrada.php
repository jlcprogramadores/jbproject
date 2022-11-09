<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Entrada
 *
 * @property $id
 * @property $cliente_id
 * @property $tipodeingreso_id
 * @property $categorias_de_entrada_id
 * @property $proyecto_id
 *
 * @property CategoriasDeEntrada $categoriasDeEntrada
 * @property Cliente $cliente
 * @property TipoDeIngreso $tipoDeIngreso
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Entrada extends Model
{
    static $rules = [
		'cliente_id' => 'required',
		'tipodeingreso_id' => 'required',
		'categorias_de_entrada_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cliente_id','tipodeingreso_id','categorias_de_entrada_id','proyecto_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoriadeentrada()
    {
        return $this->hasOne('App\Models\CategoriasDeEntrada', 'id', 'categorias_de_entrada_id');
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
    public function tipodeingreso()
    {
        return $this->hasOne('App\Models\TipoDeIngreso', 'id', 'tipodeingreso_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proyecto()
    {
        return $this->hasOne('App\Models\Proyecto', 'id', 'proyecto_id');
    }

}
