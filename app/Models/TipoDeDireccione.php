<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDeDireccione extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'es_fiscal'
    ];

    public function direcciones(){
        return $this->hasMany(Direccione::class);
    }
}
