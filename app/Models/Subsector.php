<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsector extends Model
{
    use HasFactory;
    protected $table = "subsectores";
    protected $fillable = ['nombre', 'descripcion', 'idSector'];
    public $timestamps = false;
    
    /** Obtiene todas las empresas de este subsector */
    public function empresas(){
        return $this->hasMany(Empresa::class, 'idSubsector');
    }

    /** Obtiene el Sector de este subsector */
    public function sector(){
        return $this->belongsTo(Sector::class, 'idSector');
    }

    /** Obtiene el Sector de este subsector */
    public function sustancias(){
        return $this->belongsToMany(Sustancia::class, 'susts_subsectores', 'idSubsector', 'idSustancia');
    }
}
