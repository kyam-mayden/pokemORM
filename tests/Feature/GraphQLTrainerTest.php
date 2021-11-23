<?php

namespace Tests\Feature;

use App\Trainer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GraphQLTrainerTest extends TestCase
{
    use RefreshDatabase;

    public function testWeGetTrainerDetails(): void
    {
        $this->seed();
        $response = $this->post('api/graphql/trainer', [
            'query' => '{
                  trainer (id: 1) {
                      id
                      first_name
                      second_name
                      favourite_type
                  }
                }',
        ]);

        $data = json_decode($response->getContent(), true)['data'];

        $expected = [
            'id' => '1',
            'first_name' => 'Ash',
            'second_name' => 'Ketchum',
            'favourite_type' => 'Rock',
        ];

        $this->assertEquals($expected, $data['trainer']);
    }
}
