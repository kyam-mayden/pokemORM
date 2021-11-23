<?php

use App\Http\GraphQLControllers\TrainerController;

Route::post('/trainer', [TrainerController::class, 'index']);
