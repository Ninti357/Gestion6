<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsignacionBeneficios extends Model
{
    protected $table = 'personas';
    protected $fillable = [
        'tipo_identificacion_id',
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
        'estado_id',
        'municipio_id',
        'parroquia_id',
        'comunidad_id',
    ];
}
