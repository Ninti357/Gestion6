<?php

namespace App\Models;

use App\Models\DisciplinaCategoria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genero extends Model
{
    use HasFactory;

    protected $table = 'generos';

    protected $fillable = ['genero'];

    public $timestamps = false;

    public function persona(): HasMany
    {
        return $this->hasMany(Persona::class);
    }

    public function diciplinaCategoria(): HasOne
    {
        return $this->hasOne(DisciplinaCategoria::class, 'participacion_id', 'id');
    }
}
