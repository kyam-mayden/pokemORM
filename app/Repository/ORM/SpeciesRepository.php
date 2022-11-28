<?php

namespace App\Repository\ORM;

use App\Species;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use PDO;

class SpeciesRepository
{
    public function getAll()
    {
        return Species::get()->toArray();

        // Query builder
        // See that it returns a COLLECTION of MODELS
//        $pokemon = Species // specify table
//            ::where('pokedex_number', '<', 50) // build query
//            ->get(); // execute
//        dd($pokemon);
    }

    public function getById(int $id)
    {
        return Species::where('id', $id)->get()->first()->toArray();
//        return Species::find($id)->toArray();
    }

    public function getByIdStrict(int $id)
    {
        return Species::findOrFail($id);
    }

    public function getColumnsForId(int $id)
    {
        return Species::select(['pokedex_number', 'name'])
            ->where(
                [
                    ['id', '>' , $id],
                    ['secondary_type', '!=', null],
                ])
            ->whereNull('evolves_to')
            ->orderBy('name', 'DESC')
            ->first()
            ->toArray();
    }

    public function getUnsolved()
    {
        return Species::all()->toArray();
    }
}
