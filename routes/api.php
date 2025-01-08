<?php

use App\Http\Controllers\CardController;
use Illuminate\Support\Facades\Route;

Route::get('status', function () {
    return "ok";
});

Route::apiResource('card', CardController::class);
