<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedore extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nombre',
        'razon_social',
        'estado',
        'dias_de_credito',
        'monto_de_credito',
        'es_facturable',
        'mail',
        'rfc',
        'es_activo'
    ];
    
    public function cuentasBancarias(){
        return $this->hasMany(CuentasBancaria::class);
    }
}
