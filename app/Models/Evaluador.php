<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluador extends Model
{
    use HasFactory;

    protected $table = "evaluadores";
    protected $fillable = ['nombre', 'descripcion'];

    /** Obtiene las evaluaciones que pertenecen a este evaluador */
    public function evaluaciones(){
        return $this->hasMany(Evaluacion::class, 'idEvaluador');
    }
}
