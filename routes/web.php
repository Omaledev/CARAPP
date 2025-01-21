<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;  


Route::resource('/cars', CarsController::class);



