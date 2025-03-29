<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;
    protected $table = "sectores";
    protected $fillable = ['nombre', 'descripcion'];
    public $timestamps = false;

    /** Obtiene los Subsectores de este sector */
    public function subsectores(){
        return $this->hasMany(Subsector::class, 'idSector');
    }
}
