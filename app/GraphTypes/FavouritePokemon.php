<?php

namespace App\GraphTypes;

use App\Species as SpeciesModel;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class FavouritePokemon extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => [
                'id' => Type::nonNull(Type::id()),
                'level' => Type::nonNull(Type::int()),
                'species' => [
                    'type' => new Species(),
                    'description' => 'Pokemon species',
                    'resolve' => function ($pokemon) {
                        return SpeciesModel::find($pokemon->species_id);
                    },
                ],
            ],
        ];
        parent::__construct($config);
    }
}
