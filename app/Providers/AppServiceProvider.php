<?php

namespace App\Providers;

use App\Http\Controllers\PokemonController;
use App\Http\Controllers\TrainerController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

use App\Repository\ORM\SpeciesRepository as SpeciesOrmRepository;
use App\Repository\SQL\SpeciesRepository as SpeciesSqlRepository;

use App\Repository\ORM\TrainerRepository as TrainerOrmRepository;
use App\Repository\SQL\TrainerRepository as TrainerSqlRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind(PokemonController::class, function ($app) {
            $isOrm = Request::query('orm') ?: false;
            return new PokemonController(
                $app->make(SpeciesOrmRepository::class),
                $app->make(SpeciesSqlRepository::class),
                $isOrm
            );
        });

        App::bind(TrainerController::class, function ($app) {
            $isOrm = Request::query('orm') ?: false;

            return new TrainerController(
                $app->make(TrainerOrmRepository::class),
                $app->make(TrainerSqlRepository::class),
                $isOrm
            );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
