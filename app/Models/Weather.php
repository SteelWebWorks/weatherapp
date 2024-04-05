<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Weather extends Model
{
    use HasFactory;

    protected $fillable = [
        'temperature',
        'humidity',
        'wind_speed',
    ];

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}
