<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'idEstado', 'cve_mun', 'ageb'];
    public $timestamps = false;

    /** Obtiene el Estado del municipio */
    public function estado(){
        return $this->belongsTo(Estado::class, 'idEstado');
    }

    /** Obtiene todas las empresas de este municipio */
    public function empresas(){
        return $this->hasMany(Empresa::class, 'idMunicipio');
    }
}
