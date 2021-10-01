<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\Dashboard\ResortController;
use App\Http\Controllers\Auth\Dashboard\AirportController;
use App\Http\Controllers\Auth\Dashboard\RoomTypeController;
use App\Http\Controllers\Auth\Dashboard\CompaniesController;

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
Route::group(['middleware' => 'auth:api'], function () {
  Route::post('logout', [LoginController::class, 'logout']);

  Route::get('user', [UserController::class, 'current']);

  Route::apiResources([
    'resorts' => ResortController::class,
    'airports' => AirportController::class,
    'room_types' => RoomTypeController::class,
    'companies' => CompaniesController::class
  ]);
});
Route::group(['middleware' => 'guest:api'], function () {
  Route::post('login', [LoginController::class, 'login']);
});
