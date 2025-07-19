<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clasificacion extends Model
{
    use HasFactory;

    protected $table = "clasificaciones";
    protected $fillable = ['idInstitucion', 'clasificacion', 'descripcion'];
    public $timestamps = false;

    /** Obtiene la institucion de esta clasificacion */
    public function institucion(){
        return $this->belongsTo(Institucion::class, 'idInstitucion');
    }

    /** Obtiene todas las sustancias de esta clasificación */
    public function sustancias(){
        return $this->belongsToMany(Sustancia::class, 'sust_clasificaciones', 'idClasificacion', 'idSustancia');
    }
}
