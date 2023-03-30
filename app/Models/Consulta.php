<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $table = 'consultas'; //usa el nombre de la base de datos 
    protected $fillable = ['paciente_id, fecha_consulta, hora, doctor_id, diagnostico, tratamiento'];
}
