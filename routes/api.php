<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensorController;

Route::post('/data', [SensorController::class, 'store']);
