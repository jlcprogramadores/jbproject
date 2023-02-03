<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DocumentosCandidato
 *
 * @property $id
 * @property $candidato_id
 * @property $archivo
 * @property $usuario_edito
 * @property $created_at
 * @property $updated_at
 *
 * @property Candidato $candidato
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DocumentosCandidato extends Model
{
    
    static $rules = [
		'candidato_id' => 'required',
		'archivo' => 'required',
		'usuario_edito' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['candidato_id','archivo','usuario_edito'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function candidato()
    {
        return $this->hasOne('App\Models\Candidato', 'id', 'candidato_id');
    }
    

}
