<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuentasBancaria extends Model
{
    use HasFactory;

    protected $fillable = [
        'proveedores_id',
        'banco',
        'titular_banco',
        'cuenta',
        'clabe',
        'tarjeta',
        'es_activo',
        'es_activo'
    ];
    
    public function proveedores(){
        return $this->belongsToMany(Proveedore::class);
    }
}
