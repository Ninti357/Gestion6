<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = 'registros';
    protected $fillable = ['cedula', 'Primer_nombre', 'Segundo_nombre', 'Primer_apellido',
     'Segundo_apellido', 'Fecha_de_nacimiento', 'email'];
    use HasFactory;
}
