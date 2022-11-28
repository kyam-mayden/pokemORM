<?php

namespace App\Repository\SQL;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use PDO;

class SpeciesRepository
{
    private PDO $db;

    public function __construct()
    {
        $db = new PDO('mysql:host=mysql;dbname=pokemorm', 'user', 'password');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        $this->db = $db;
    }

    public function getAll()
    {
        $query = $this->db->prepare('SELECT * FROM species;');
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();

        return $query->fetchAll();
    }

    public function getById(int $id)
    {
        $query = $this->db->prepare('SELECT * FROM species WHERE `id` = :id');
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute(['id' => $id]);

        return $query->fetch();
    }

    public function getByIdStrict(int $id)
    {
        $query = $this->db->prepare('SELECT * FROM species WHERE `id` = :id');
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute(['id' => $id]);

        $result = $query->fetch();

        if (!$result) {
            throw new ModelNotFoundException('Id not found');
        }

        return $result;
    }

    public function getColumnsForId(int $id)
    {
        $query = $this->db->prepare(
            'SELECT pokedex_number, `name` FROM species
              WHERE id > :id
                AND secondary_type IS NOT NULL
                AND evolves_to IS NULL
              ORDER BY name DESC');
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute(['id' => $id]);

        return $query->fetch();
    }

    public function getUnsolved()
    {
        $query = $this->db->prepare(
            "SELECT `name`, primary_type FROM species
              WHERE name LIKE 's%'
                AND evolves_to IS NOT NULL
              ORDER BY name DESC
              LIMIT 5"
        );
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();

        return $query->fetchAll();
    }
}
