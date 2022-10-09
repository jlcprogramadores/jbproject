<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccione extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipodedireccion_id',
        'cliente_id',
        'proveedor_id',
        'calle',
        'num_int',
        'num_ext',
        'codigo_postal',
        'colonia',
        'municipio',
        'estado',
        'pais',
        'es_activo'
    ];
        
    public function tipoDeDireccione(){
        return $this->belongsToMany(TipoDeDireccione::class);
    }
}
