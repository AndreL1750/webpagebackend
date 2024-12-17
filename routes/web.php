<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Carslist;
use App\Http\Controllers\Maintenancelist;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/',[Carslist::class, 'carsList'])->name('cars.list');
Route::get('/carsCreate',[Carslist::class, 'carsCreate']);
Route::get('/cars/{Plate}',[Carslist::class, 'carsPage'])->name('cars.page');

Route::get('/test-mongodb', [Maintenancelist::class, 'listAll']);

Route::get('/maintenances', [Maintenancelist::class, 'listMaintenances']);
Route::post('/cars/{Plate}/addMaintenance', [Maintenancelist::class, 'store']);

