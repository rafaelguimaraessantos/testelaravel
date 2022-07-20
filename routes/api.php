<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CakeController;

Route::resource('/cake', CakeController::class);

Route::post('/cake-interested', [CakeController::class, 'cakeInterested']);