<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\Dashboard\ResortController;

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
  ]);
});
Route::group(['middleware' => 'guest:api'], function () {
  Route::post('login', [LoginController::class, 'login']);
});
