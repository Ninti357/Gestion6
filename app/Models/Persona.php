<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Persona extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'personas';

    protected $fillable = [
        'tipo_identificacion',
        'cedula',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'email',
        'telefono',
        'celular',
        'genero_id',
        'fecha_nacimiento',
        'pueblo_id',
        'estado_civil_id',
        'comunidad_id',
    ];
}
