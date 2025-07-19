<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    use HasFactory;

    protected $table = "instituciones";
    protected $fillable = ['nombre', 'descripcion'];
    public $timestamps = false;

    /** Obtiene las clasificaciones de esta institucion */
    public function clasificaciones(){
        return $this->hasMany(Clasificacion::class, 'idInstitucion');
    }
}
