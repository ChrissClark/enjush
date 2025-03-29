<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    use HasFactory;
    
    protected $table = "evaluaciones";
    protected $fillable = ['idEvaluador', 'idEmpresa', 'matriz', 'año', 'unidad', 'created_at', 'updated_at'];

    /** Obtiene la empresa de esta evaluación */
    public function matriz_ambiental(){
        return $this->hasMany(MatrizAmbiental::class, 'idEvaluacion');
    }

    /** Obtiene la empresa de esta evaluación */
    public function empresa(){
        return $this->belongsTo(Empresa::class, 'idEmpresa');
    }

    /** Obtiene la empresa de esta evaluación */
    public function evaluador(){
        return $this->belongsTo(Evaluador::class, 'idEvaluador');
    }
}
