<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'razon_social',
        'mail',
        'rfc',
        'es_activo'
    ];

    public function entradas(){
        return $this->hasMany(Entrada::class);
    }
}
