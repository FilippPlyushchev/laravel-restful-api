<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Country\CountryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [LoginController::class, 'login']);

Route::group(['middleware' => ['jwt.verify']], function(){
    Route::get('country', [CountryController::class, 'country']);
    Route::get('country/{id}', [CountryController::class, 'countryById']);

    Route::post('country', [CountryController::class, 'countrySave']);
    Route::put('country/{id}', [CountryController::class, 'countryEdit']);
    Route::delete('country/{id}', [CountryController::class, 'countryDestroy']);

    Route::get('refresh', [LoginController::class, 'refresh']);
});
