<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sustancia extends Model
{
    use HasFactory;

    protected $table = "sustancias";
    protected $fillable = ['nombre', 'descripcion'];
    public $timestamps = false;

    /** Obtiene todas las matrices que se relaciona a una sustancia */
    public function matriz_ambiental(){
        return $this->hasMany(MatrizAmbiental::class, 'idSustancia');
    }

    /** Obtiene todas las clasificaciones de una sustancia */
    public function clasificaciones(){
        return $this->belongsToMany(Clasificacion::class, 'sust_clasificaciones', 'idSustancia', 'idClasificacion');
    }
}
