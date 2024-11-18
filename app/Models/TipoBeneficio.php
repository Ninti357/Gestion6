<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoBeneficio extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tipos_beneficios';

    protected $fillable = [
        'tipo_beneficio',
    ];

    public function beneficios(): HasMany
    {
        return $this->hasMany(Beneficio::class);
    }
    public function AsignacionBeneficios(): BelongsTo
    {
        return $this->belongsTo(AsignacionBeneficios::class);
    }
}
