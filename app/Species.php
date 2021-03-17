<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Species extends Model
{
    protected $table = 'species';

    public $timestamps = false;

    protected $fillable = [
        'pokedex_number',
        'evolves_to',
        'name',
        'primary_type',
        'secondary_type',
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(
            PokemonType::class,
            'primary_type',
            'id'
        );
    }
}
