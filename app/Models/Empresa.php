<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    
    protected $fillable = ['nombre', 'idMunicipio', 'idSubsector', 'latitud', 'longitud'];
    public $timestamps = false;

    /** Obtiene las evaluaciones de esta empresa */
    public function evaluaciones(){
        return $this->hasMany(Evaluacion::class, 'idEmpresa');
    }

    /** Obtiene las evaluaciones de esta empresa */
    public function nras(){
        return $this->hasMany(NRA::class, 'idEmpresa');
    }

    /** Obtiene el Subsector de la empresa */
    public function subsector(){
        return $this->belongsTo(Subsector::class, 'idSubsector');
    }

    /** Obtiene el Municipio de la empresa */
    public function municipio(){
        return $this->belongsTo(Municipio::class, 'idMunicipio');
    }

    /** Obtiene la ubicacion completa con abreviacion del estado */
    public function ubicacion(){
        $municipio = $this->municipio;

        return $municipio->nombre.", ".$municipio->estado->abreviacion;
    }
}
