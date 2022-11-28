<?php

namespace App\Repository\ORM;

use App\Trainer;

class TrainerRepository
{
    public function create(array $newTrainer)
    {
        $trainer = new Trainer($newTrainer);
        $trainer->save();
    }

    public function createMany(array $newTrainers)
    {
        foreach ($newTrainers as $newTrainer) {
            $trainer = new Trainer($newTrainer);
            $trainer->save();

            // OR

//            Trainer::create($newTrainer);
        }
    }

    public function createAndGet(array $newTrainer)
    {
        return Trainer::create($newTrainer);
    }

    public function createNew(array $newTrainer)
    {
        Trainer::create($newTrainer);
    }
}
