<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Registro extends Model
{   
    use SoftDeletes;
    use HasFactory;
    protected $table = 'registros';
    protected $fillable = ['cedula', 'primer_nombre', 'segundo_nombre', 'primer_apellido',
     'segundo_apellido', 'fecha_de_nacimiento', 'email'];
}
