<?php
/** @noinspection ALL */

namespace App\Http\Controllers;

use App\Repository\ORM\TrainerRepository as OrmRepository;
use App\Repository\SQL\TrainerRepository as SqlRepository;
use App\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class TrainerController extends Controller
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
        $trainers = Trainer::get()->reverse();
        return view('trainerTable')->with('trainers', $trainers);
    }

    public function create()
    {
        $newTrainer = [
            'first_name' => 'Vinnie',
            'second_name' => 'Jones',
            'home_town' => 1,
            'favourite_pokemon' => 150,
            'favourite_type' => 5,
            'evil' => true,
        ];

        if (!$this->isOrm) {
            $this->sql->create($newTrainer);
        } else {
            $this->orm->create($newTrainer);
        }

        return redirect('/trainer');
    }

    public function createMany()
    {
        $newTrainers = [
            [
                'first_name' => 'Vinnie',
                'second_name' => 'Jones',
                'home_town' => 1,
                'favourite_pokemon' => 150,
                'favourite_type' => 5,
                'evil' => true,
            ],
            [
                'first_name' => 'Dennis',
                'second_name' => 'Wise',
                'home_town' => 4,
                'favourite_pokemon' => 55,
                'favourite_type' => 2,
                'evil' => true,
            ],
            [
                'first_name' => 'Mick',
                'second_name' => 'Hartford',
                'home_town' => 6,
                'favourite_pokemon' => 12,
                'favourite_type' => 9,
                'evil' => true,
            ],
        ];

        if (!$this->isOrm) {
            $this->sql->createMany($newTrainers);
        } else {
            $this->orm->createMany($newTrainers);
        }

        return redirect('/trainer');
    }

    public function createAndGet()
    {
        $newTrainer = [
            'first_name' => 'Vinnie',
            'second_name' => 'Jones',
            'home_town' => 1,
            'favourite_pokemon' => 150,
            'favourite_type' => 5,
            'evil' => true,
        ];

        if (!$this->isOrm) {
            $new = $this->sql->createAndGet($newTrainer);
        } else {
            $new = $this->orm->createAndGet($newTrainer);
        }

        var_dump($new);
    }

    public function createNew()
    {
        $newTrainer = [
            'first_name' => 'Vinnie',
            'second_name' => 'Jones',
            'home_town' => 1,
            'favourite_pokemon' => 150,
            'favourite_type' => 5,
            'evil' => true,
        ];

        if (!$this->isOrm) {
            $new = $this->sql->createNew($newTrainer);
        } else {
            $new = $this->orm->createNew($newTrainer);
        }

        return redirect('/trainer');

    }
}
