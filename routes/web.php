<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CollectableController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\CityController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard',[HomeController::class,'index'] );

Route::resource('collectables', CollectableController::class)->names([
    'index' => 'collectables'
]);
Route::resource('buildings', BuildingController::class)->names([
    'index' => 'buildings'
]);

Route::get('getStates/{id}',[CityController::class, 'getStates']);