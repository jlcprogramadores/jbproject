<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriasDeEntrada extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'es_activo'
    ];

    public function entradas(){
        return $this->hasMany(Entrada::class);
    }
}
