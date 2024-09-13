<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pueblo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pueblos';

    protected $fillable = ['pueblo', 'autodenominacion', 'comunidades_principales', 'filiacion_linguistica', 'proveniencia', 'caracteristica', 'poblacion_2011'];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

}
