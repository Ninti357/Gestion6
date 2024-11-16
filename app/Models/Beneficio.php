<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Beneficio extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'beneficios';

    protected $fillable = [
        'beneficio',
        'tipo_beneficio_id'
    ];

    public function tipo(): BelongsTo
    {
        return $this->belongsTo(TipoBeneficio::class, 'tipo_beneficio_id');
    }
    public function AsignacionBeneficios(): BelongsTo
    {
        return $this->belongsTo(AsignacionBeneficios::class);
    }

}
