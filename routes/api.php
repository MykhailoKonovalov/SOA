<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('cars', 'App\Http\Controllers\Api\CarsController');
