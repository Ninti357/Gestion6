<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Spatie\Activitylog\LogOptions;

class Comunidad extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'comunidades';

    protected $fillable = ['estado_id', 'municipio_id', 'parroquia_id', 'comunidad', 'poblacion', 'poblacion_electoral', 'proyeccion_votos', 'lider_nombre_apellidos', 'lider_cedula', 'lider_telefono', 'cc_nombre_apellidos', 'cc_cedula', 'cc_telefono', 'vocero_clap_nombre_apellidos', 'vocero_clap_cedula', 'vocero_clap_telefono'];

    public $timestamps = false;

    public function estado(): BelongsTo
    {
        return $this->belongsTo(Estado::class);
    }

    public function municipio(): BelongsTo
    {
        return $this->belongsTo(Municipio::class);
    }

    public function parroquia(): BelongsTo
    {
        return $this->belongsTo(Parroquia::class);
    }

}
