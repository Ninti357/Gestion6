<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Estado extends Model
{
    use HasFactory;

    protected $table = 'estados';

    protected $fillable = ['estado'];

    public $timestamps = false;

    public function municipios(): HasMany
    {
        return $this->hasMany(Municipio::class);
    }

    public function municipioParroquia(): HasOneThrough
    {
        return $this->hasOneThrough(Parroquia::class, Municipio::class);
    }

    public function votosProyectados(): HasMany
    {
        $eleccion = Eleccion::where('status', true)->orderBy('id', 'desc')->first();
        return $this->hasMany(VotoProyectadoEstado::class)->where('eleccion_id', $eleccion->id);
    }

    public function incidencia(): HasMany
    {
        return $this->hasMany(Incidencia::class);
    }

    public function proyeccion(): HasOne
    {
        return $this->hasOne(ProyeccionVoto::class)->where('eleccion_id', Eleccion::where('status_id', 1)->orderBy('id', 'desc')->first()->id);
    }

    public function votos(): HasMany
    {
        return $this->hasMany(Voto::class)->where('eleccion_id', Eleccion::where('status_id', 1)->orderBy('id', 'desc')->first()->id);
    }

}
