<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\PosnetController;
use Illuminate\Support\Facades\Route;

Route::get('status', function () {
    return "ok";
});

Route::apiResource('card', CardController::class);
Route::post('process_payment', [PosnetController::class, 'payment']);
