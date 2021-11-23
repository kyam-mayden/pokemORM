<?php

namespace App\GraphTypes;

use App\PokemonType;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class Trainer extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => [
                'id' => Type::nonNull(Type::id()),
                'first_name' => Type::string(),
                'second_name' => Type::string(),
                'favourite_type' => [
                    'type' => Type::string(),
                    'description' => 'Trainers Favourite Type',
                    'resolve' => function($trainer) {
                        return PokemonType::find($trainer->favourite_type)->name;
                    }
                ],
            ],
        ];
        parent::__construct($config);
    }
}