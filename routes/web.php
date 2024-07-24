<?php

use App\Http\Controllers\FlowerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('flowers', FlowerController::class);
