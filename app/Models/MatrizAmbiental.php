<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatrizAmbiental extends Model
{
    use HasFactory;

    protected $table = "matriz_ambiental";
    protected $fillable = ['idSustancia', 'idEvaluacion', 'matriz', 'valor'];
    public $timestamps = false;

    /** Obtiene la evaluacion de esta matriz */
    public function evaluacion(){
        return $this->belongsTo(Evaluacion::class, 'idEvaluacion');
    }

    /** Obtiene la sustancia de esta matriz */
    public function sustancia(){
        return $this->belongsTo(Sustancia::class, 'idSustancia');
    }

    /** Obtiene la sustancia de esta matriz */
    public function tipoSust(){
        return $this->belongsTo(SustTipo::class, 'id_sust_tipo');
    }
}
