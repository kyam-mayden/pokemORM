<?php

namespace App\Repository\SQL;

use App\Trainer;
use Illuminate\Support\Facades\DB;
use PDO;

class TrainerRepository
{
    private PDO $db;

    public function __construct()
    {
        $db = new PDO('mysql:host=mysql;dbname=pokemorm', 'user', 'password');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        $this->db = $db;
    }

    public function create(array $newTrainer)
    {
        $query = $this->db->prepare(
            'INSERT INTO trainer (first_name,
                                  second_name,
                                  home_town,
                                  favourite_pokemon,
                                  favourite_type,
                                  evil,
                                  created_at,
                                  updated_at)
                          VALUES (?,?,?,?,?,?, NOW(), NOW())'
        );
        $query->execute(array_values($newTrainer));
    }

    public function createMany(array $newTrainers)
    {
        foreach ($newTrainers as $newTrainer) {
            DB::INSERT(
                'INSERT INTO trainer (first_name,
                                  second_name,
                                  home_town,
                                  favourite_pokemon,
                                  favourite_type,
                                  evil,
                                  created_at,
                                  updated_at)
                          VALUES (?,?,?,?,?,?, NOW(), NOW())',
                array_values($newTrainer)
            );
        }
    }

    public function createAndGet(array $newTrainer)
    {
        $query = $this->db->prepare(
            'INSERT INTO trainer (first_name,
                                  second_name,
                                  home_town,
                                  favourite_pokemon,
                                  favourite_type,
                                  evil,
                                  created_at,
                                  updated_at)
                          VALUES (?,?,?,?,?,?, NOW(), NOW())'
        );
        $query->execute(array_values($newTrainer));

        $lastInsertId = $this->db->lastInsertId();

        $query = $this->db->prepare(
            'SELECT * FROM trainer
              WHERE id = :id');
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute(['id' => $lastInsertId]);

        return $query->fetch();
    }

    public function createNew(array $newTrainer)
    {
        $query = $this->db->prepare(
            'INSERT INTO trainer (first_name,
                                  second_name,
                                  home_town,
                                  favourite_pokemon,
                                  favourite_type,
                                  evil,
                                  created_at,
                                  updated_at)
                          SELECT ?,?,?,?,?,?, NOW(), NOW()
                          WHERE NOT EXISTS (SELECT * FROM trainer WHERE first_name = ? AND second_name = ? LIMIT 1)'
        );

        $query->execute(
            array_merge(
                array_values($newTrainer),
                [
                    $newTrainer['first_name'],
                    $newTrainer['second_name'],
                ]
            )
        );
    }
}
