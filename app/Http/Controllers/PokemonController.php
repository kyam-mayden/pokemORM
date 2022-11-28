<?php

namespace App\Http\Controllers;

use App\Repository\ORM\SpeciesRepository as OrmRepository;
use App\Repository\SQL\SpeciesRepository as SqlRepository;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    private OrmRepository $orm;
    private SqlRepository $sql;
    private bool $isOrm;

    public function __construct(OrmRepository $orm, SqlRepository $sql, bool $isOrm)
    {
        $this->orm = $orm;
        $this->sql = $sql;
        $this->isOrm = $isOrm;
    }

    public function index()
    {
        if (!$this->isOrm) {
            $pokemon = $this->sql->getAll();
        } else {
            $pokemon = $this->orm->getAll();
        }

        return view('pokemonTable')->with('species', $pokemon);
    }

    public function get(Request $request, $id)
    {
        if (!$this->isOrm) {
            $pokemon = $this->sql->getById($id);
        } else {
            $pokemon = $this->orm->getById($id);
        }

        return view('singlePokemon')->with('pokemon', $pokemon);
    }

    public function getStrict(Request $request, $id)
    {
        if (!$this->isOrm) {
            $pokemon = $this->sql->getByIdStrict($id);
        } else {
            $pokemon = $this->orm->getByIdStrict($id);
        }

        return view('singlePokemon')->with('pokemon', $pokemon);
    }

    public function getColumns(Request $request, $id)
    {
        if (!$this->isOrm) {
            $pokemon = $this->sql->getColumnsForId($id);
        } else {
            $pokemon = $this->orm->getColumnsForId($id);
        }

        return view('singlePokemon')->with('pokemon', $pokemon);
    }

    public function getUnsolved(Request $request)
    {
        if (!$this->isOrm) {
            $pokemon = $this->sql->getUnsolved();
        } else {
            $pokemon = $this->orm->getUnsolved();
        }

        return view('pokemonTableReduced')->with('species', $pokemon);
    }
}
