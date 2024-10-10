<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Beneficio extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'beneficios';

    protected $fillable = [
        'beneficio',
        'tipo_beneficio_id'
    ];

    
}
