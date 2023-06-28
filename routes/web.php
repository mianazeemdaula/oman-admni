<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CollectableController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserUpdateController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\OrganizationUpdateController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\WaiverController;
use App\Http\Controllers\DedicateController;
use App\Http\Controllers\ExitCountryController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CityController;

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::post('login', [LoginController::class,'doLogin']);
Route::get('logout', [LoginController::class,'logout']);

Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard',[HomeController::class,'index'] );

    Route::resource('collectables', CollectableController::class)->names([
        'index' => 'collectables'
    ]);
    Route::resource('buildings', BuildingController::class)->names([
        'index' => 'buildings'
    ]);

    Route::post('buildings-status/{id}',[BuildingController::class,'updateStatus']);

    Route::resource('users', UserController::class)->names([
        'index' => 'users'
    ]);
    Route::resource('userupdates', UserUpdateController::class)->names([
        'index' => 'userupdates'
    ]);
    

    Route::resource('admins', AdminController::class)->names([
        'index' => 'admins'
    ]);

    Route::resource('organizations', OrganizationController::class)->names([
        'index' => 'organizations'
    ]);
    Route::resource('organizationupdate', OrganizationUpdateController::class)->names([
        'index' => 'organizationupdate'
    ]);

    Route::resource('sells', SellController::class)->names([
        'index' => 'sells'
    ]);
    Route::get('gifts', [SellController::class, 'getGifts'])->name('gifts');
    

    Route::resource('exits', ExitCountryController::class)->names([
        'index' => 'exits'
    ]);

    Route::resource('loans', LoanController::class)->names([
        'index' => 'loans'
    ]);
    Route::resource('waivers', WaiverController::class)->names([
        'index' => 'waivers'
    ]);
    Route::resource('dedicates', DedicateController::class)->names([
        'index' => 'dedicates'
    ]);
    
    Route::resource('news', NewsController::class)->names([
        'index' => 'news'
    ]);
    Route::resource('certificates', CertificateController::class)->names([
        'index' => 'certificates'
    ]);
    Route::resource('banners', BannerController::class)->names([
        'index' => 'banners'
    ]);
});

Route::get('getStates/{id}',[CityController::class, 'getStates']);