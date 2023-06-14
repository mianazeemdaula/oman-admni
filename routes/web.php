<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CollectableController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CityController;

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::post('login', [LoginController::class,'doLogin']);
Route::get('logout', [LoginController::class,'logout']);

// Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard',[HomeController::class,'index'] );

    Route::resource('collectables', CollectableController::class)->names([
        'index' => 'collectables'
    ]);
    Route::resource('buildings', BuildingController::class)->names([
        'index' => 'buildings'
    ]);

    Route::resource('users', UserController::class)->names([
        'index' => 'users'
    ]);

    Route::resource('admins', AdminController::class)->names([
        'index' => 'admins'
    ]);

    Route::resource('organizations', OrganizationController::class)->names([
        'index' => 'organizations'
    ]);

    Route::resource('news', NewsController::class)->names([
        'index' => 'news'
    ]);
// });

Route::get('getStates/{id}',[CityController::class, 'getStates']);