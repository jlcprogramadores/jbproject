<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriasFamilia extends Model
{
    use HasFactory;

    protected $fillable = [
        'familias_id',
        'nombre',
        'descripcion',
        'es_activo'
    ];

    public function familias(){
        return $this->belongsToMany(Familia::class);
    }
}
