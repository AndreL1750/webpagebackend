<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\carslist;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/',[carslist::class, 'carsList']);
