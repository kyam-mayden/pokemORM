<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $table = 'trainer';

    protected $softDelete = true;

    protected $casts = [
        'evil' => 'boolean',
    ];

    protected $fillable = [
        'first_name',
        'second_name',
        'home_town',
        'favourite_pokemon',
        'evil',
    ];

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->second_name}";
    }

    public function setNameAttribute($name)
    {
        [$firstName, $secondName] = explode('_', $name);

        $this->attributes['first_name'] = strtolower($firstName);
        $this->attributes['second_name'] = strtolower($secondName);
    }
}
