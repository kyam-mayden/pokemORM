<?php

namespace App\Http\GraphQLControllers;

use App\GraphTypes\FavouritePokemon;
use App\GraphTypes\FavouritePokemon as PokemonType;
use App\GraphTypes\Trainer as TrainerType;
use App\Http\Controllers\Controller;
use App\Pokemon as PokemonModel;
use App\Schema\SchemaDefinition;
use App\Trainer as TrainerModel;
use GraphQL\GraphQL;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Schema;
use Illuminate\Support\Facades\Request;

class TrainerController extends Controller
{
    public function index()
    {
        $schema = SchemaDefinition::define();

        $input = Request::all();
        $query = $input['query'];

        try {
            $result = GraphQL::executeQuery(
                $schema,
                $query,
            );
            $output = $result->toArray();
        } catch (\Exception $e) {
            $output = [
                'errors' => [
                    [
                        'message' => $e->getMessage()
                    ]
                ]
            ];
        }

        return $output;
    }
}
