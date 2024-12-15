<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\PredictionController;

Route::get('/', [PredictionController::class, 'index']);
Route::post('/predict', [PredictionController::class, 'predict']);