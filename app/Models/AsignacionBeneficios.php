<?php

namespace App\Models;

use App\Models\Persona;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AsignacionBeneficios extends Model
{

    Use SoftDeletes;

    protected $table = 'asignacion_beneficios';
    protected $fillable = [
        'tipo_beneficio_id',
        'beneficio_id',
        'persona_id',
        'cantidad',
        'observaciones'
    ];
    public function tipoBeneficio(): BelongsTo
    {
        return $this->belongsTo(TipoBeneficio::class);
    }
    public function beneficio(): BelongsTo
    {
        return $this->belongsTo(Beneficio::class);
    }
 	public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class);
    }



}
