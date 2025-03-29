<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SustTipo extends Model
{
    use HasFactory;

    protected $table = "sust_tipos";
    protected $fillable = ['idSustancia', 'nombre'];
    public $timestamps = false;

    /** Obtiene las matrices de este tipo de sustancia */
    public function matriz(){
        return $this->hasMany(MatrizAmbiental::class, 'id_sust_tipo');
    }

    /** Obtiene la sustancia de este tipo (sustancia raiz) */
    public function sustancia(){
        return $this->belongsTo(Sustancia::class, 'idSustancia');
    }
}
