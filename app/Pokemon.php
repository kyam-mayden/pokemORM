<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pokemon extends Model
{
    use HasFactory;

    protected $table = 'pokemon';

    protected $fillable = [
        'species_id',
        'trainer_id',
        'level',
    ];

    public function species(): BelongsTo
    {
        return $this->belongsTo(
            Species::class,
            'species_id',
            'id'
        );
    }
}
