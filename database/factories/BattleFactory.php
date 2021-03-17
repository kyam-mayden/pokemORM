<?php

namespace Database\Factories;

use App\Battle;
use App\Trainer;
use Illuminate\Database\Eloquent\Factories\Factory;

class BattleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Battle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $trainers = Trainer::all();
        $battleTrainers = $trainers->random(2);

        return [
            'trainer_1' => $battleTrainers->first()->id,
            'trainer_2' => $battleTrainers->last()->id,
            'winner_id' => $battleTrainers->random(1)->first()->id,
        ];
    }
}