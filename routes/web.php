<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Carslist;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/',[Carslist::class, 'carsList'])->name('cars.list');
Route::get('/carsCreate',[Carslist::class, 'carsCreate']);
Route::get('/cars/{Plate}',[Carslist::class, 'carsPage'])->name('cars.page');

