<?php

namespace Tests\Feature;

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
}
