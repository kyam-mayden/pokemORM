<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use \Illuminate\Database\Eloquent\Builder;

class Pokemon extends Model
{
    protected $table = 'pokemon';

    protected $fillable = [
        'species_id',
        'trainer_id',
        'level',
    ];

    public function species(): BelongsTo
    {
        return $this->belongsTo(Species::class, 'species_id', 'id');
    }

    public function scopeLevelMoreThan(Builder $builder, $level): Builder
    {
        return $builder->where('level', '>', $level);
    }

    public function scopeFinalEvolution(Builder $builder): Builder
    {
        return $builder->whereHas('species', function ($builder) {
            return $builder->where('evolves_to', null);
        });
    }
}
