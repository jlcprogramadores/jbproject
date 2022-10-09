<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'tipodeingreso_id',
        'categorias_de_entrada_id',
        'proyecto_id '
    ];

    public function clientes(){
        return $this->belongsToMany(Cliente::class);
    }
    
    public function tipoDeIngresos(){
        return $this->belongsToMany(TipoDeIngreso::class);
    }

    public function categoriasDeEntrada(){
        return $this->belongsToMany(CategoriasDeEntrada::class);
    }
}
