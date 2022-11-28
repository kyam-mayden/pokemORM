<?php

namespace App\Providers;

use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

use App\Repository\ORM\SpeciesRepository as OrmRepository;
use App\Repository\SQL\SpeciesRepository as SqlRepository;

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
                $app->make(OrmRepository::class),
                $app->make(SqlRepository::class),
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
