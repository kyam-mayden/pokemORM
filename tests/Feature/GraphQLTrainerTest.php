<?php

namespace Tests\Feature;

use App\Pokemon;
use App\Trainer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GraphQLTrainerTest extends TestCase
{
    public function testWeGetTrainerDetails(): void
    {
        $response = $this->post('api/graphql/trainer', [
            'query' => '{
                  trainer (id: 1) {
                      id
                      first_name
                      second_name
                  }
                }',
        ]);

        $data = json_decode($response->getContent(), true)['data'];

        $expected = [
            'id' => '1',
            'first_name' => 'Ash',
            'second_name' => 'Ketchum',
        ];

        $this->assertEquals($expected, $data['trainer']);
    }

    public function testWeGetTrainerFavouriteType(): void
    {
        $response = $this->post('api/graphql/trainer', [
            'query' => '{
                  trainer (id: 1) {
                      favourite_type
                  }
                }',
        ]);

        $data = json_decode($response->getContent(), true)['data'];

        $expected = [
            'favourite_type' => 'Rock',
        ];

        $this->assertEquals($expected, $data['trainer']);
    }


    public function testWeGetTrainedPokemon(): void
    {
        $response = $this->post('api/graphql/trainer', [
            'query' => '{
                 trainer (id: 1) {
                      trained_pokemon {
                          id
                          species {
                              name
                              pokedex_number
                              primary_type
                              secondary_type
                          }
                      }
                  }
                }',
        ]);

        $data = json_decode($response->getContent(), true)['data'];
        $expected = Pokemon::where('trainer_id', 1)->get();

        $this->assertCount($expected->count(), $data['trainer']['trained_pokemon']);

        $expected = $expected->map(function ($trained) {
            return [
                'id' => $trained->id,
                'species' => [
                    'name' => $trained->species->name,
                    'pokedex_number' => $trained->species->pokedex_number,
                    'primary_type' => $trained->species->primaryType->name,
                    'secondary_type' => $trained->species->secondaryType?->name,
                ],
            ];
        })->toArray();

        $this->assertEquals($expected, $data['trainer']['trained_pokemon']);
    }
}
