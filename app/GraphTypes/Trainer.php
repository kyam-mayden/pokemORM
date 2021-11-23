<?php

namespace App\GraphTypes;

use App\Pokemon as PokemonModel;
use App\PokemonType as PokemonTypeModel;
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
                    'resolve' => function ($trainer) {
                        return PokemonTypeModel::find($trainer->favourite_type)?->name;
                    }
                ],
//                'favourite_pokemon' => [
//                    'type' => new FavouritePokemon(),
//                    'description' => 'Trainers Favourite Pokemon',
//                    'resolve' => function($trainer) {
//                        return PokemonModel::find($trainer->favourite_pokemon);
//                    }
//                ],
                'trained_pokemon' => [
                    'type' => Type::listOf(new TrainedPokemon()),
                    'description' => 'Trainers Trained Pokemon',
                    'resolve' => function($trainer) {
                        return PokemonModel::where('trainer_id', $trainer->id)->get();
                    }
                ]
            ],
        ];
        parent::__construct($config);
    }
}