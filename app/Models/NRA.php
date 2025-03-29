<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NRA extends Model
{
    use HasFactory;
    protected $table = "NRA";
    protected $fillable = ['NRA', 'idEmpresa'];

    /** Obtiene la empresa de este NRA */
    public function empresa(){
        return belongsTo(Empresa::class, 'idEmpresa');
    }
}
