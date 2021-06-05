<?php

use App\Http\Controllers\UserController;
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

// show all users
Route::get('/users', [UserController::class, 'index']); 

// show a user by if
Route::get('/user/{id}', [UserController::class, 'show']);

// add a new quote to a user
Route::post('/user', [UserController::class, 'store']);

// update a user (name or address)
Route::put('/user/{id}', [UserController::class, 'update']);