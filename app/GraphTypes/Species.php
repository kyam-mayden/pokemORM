<?php

namespace App\GraphTypes;

use App\PokemonType as PokemonTypeModel;
use App\Species as SpeciesModel;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class Species extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => [
                'id' => Type::nonNull(Type::id()),
                'name' => Type::nonNull(Type::string()),
                'pokedex_number' => Type::nonNull(Type::int()),
                'primary_type' => [
                    'type' => Type::nonNull(Type::string()),
                    'description' => 'Species primary type',
                    'resolve' => function ($species) {
                        return PokemonTypeModel::find($species->primary_type)->name;
                    },
                ],
                'secondary_type' => [
                    'type' => Type::string(),
                    'description' => 'Species secondary type',
                    'resolve' => function ($species) {
                        $model = PokemonTypeModel::find($species->secondary_type);
                        return $model ?-> name;
                    },
                ],
//                'evolves_to' => [
//                    'type' => Type::nonNull(Type::string()),
//                    'description' => 'Species primary type',
//                    'resolve' => function ($species) {
//                        return 'cheese';
//                    },
//                ],
            ],
        ];
        parent::__construct($config);
    }
}
