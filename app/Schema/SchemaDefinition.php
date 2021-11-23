<?php

namespace App\Schema;

use App\GraphTypes\Pokemon as PokemonType;
use App\GraphTypes\Trainer as TrainerType;
use App\Pokemon as PokemonModel;
use App\Trainer as TrainerModel;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Schema;

class SchemaDefinition
{
    public static function define(): Schema
    {
        return new Schema(
            [
                'query' => self::defineQuerySchema(),
                'mutation' => self::defineMutationSchema(),
            ]
        );
    }

    private static function defineMutationSchema(): ObjectType
    {
        return new ObjectType(
            [
                'name' => 'Mutation',
                'fields' => [],
            ]
        );
    }

    private static function defineQuerySchema(): ObjectType
    {
        return new ObjectType(
            [
                'name' => 'Query',
                'fields' => [
                    'trainer' => [
                        'type' => new TrainerType(),
                        'args' => [
                            'id' => [
                                'type' => Type::int()
                            ]
                        ],
                        'resolve' => function ($rootValue, $args) {
                            $id = $args['id'] ?: null;
                            return TrainerModel::findOrFail($id);
                        },
                    ],
                    'pokemon' => [
                        'type' => new PokemonType(),
                        'args' => [
                            'id' => [
                                'type' => Type::int()
                            ]
                        ],
                        'resolve' => function ($rootValue, $args) {
                            $id = $args['id'] ?: null;
                            return PokemonModel::find($id);
                        },
                    ],
                ],
            ]
        );
    }
}
