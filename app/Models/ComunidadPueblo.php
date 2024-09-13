<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ComunidadPueblo extends Model
{
    use HasFactory;

    protected $table = 'comunidades_pueblos';

    protected $fillable = [
        'pueblo_id',
        'comunidad_id',
    ];

    public function pueblo(): BelongsTo
    {
        return $this->belongsTo(Pueblo::class);
    }
}
