<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Punto extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nombre', 'latitud', 'longitud'];
    public $timestamps = false;
}
