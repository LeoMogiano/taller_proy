<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medico extends Model
{
    use HasFactory;
    protected $table='medicos'; //usa el nombre de la base de datos 
    protected $fillable = ['nombre, edad, sexo, direccion, telefono, estado'];
}
