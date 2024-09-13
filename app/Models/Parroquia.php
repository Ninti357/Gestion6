<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Parroquia extends Model
{
    use HasFactory;

    protected $table = 'parroquias';

    protected $fillable = ['parroquia', 'municipio_id'];
    
    public $timestamps = false;

    public function municipio(): BelongsTo
    {
        return $this->belongsTo(Municipio::class);
    }
    
    public function parroquiaEstado(): HasOneThrough
    {
        return $this->hasOneThrough(Parroquia::class, Municipio::class);
    }
}
