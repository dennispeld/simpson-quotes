<?php

use App\Http\Controllers\QuotationController;
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

// update a user
Route::put('/user/{id}', [UserController::class, 'update']);

// add a new quote to a user
Route::post('/user/quote', [QuotationController::class, 'store']);

// show quotes of a user
Route::get('/user/{id}/quotes', [QuotationController::class, 'show']);