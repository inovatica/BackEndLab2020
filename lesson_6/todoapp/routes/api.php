<?php

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

Route::post("login", \App\Http\Controllers\Auth\LoginController::class . "@login");

Route::prefix("to-do")->group(function () {
    Route::get("", \App\Http\Controllers\ToDoController::class . "@index")->middleware("guest");
    Route::get("{to_do}", \App\Http\Controllers\ToDoController::class . "@show")->middleware("guest");
    Route::post("", \App\Http\Controllers\ToDoController::class . "@store")->middleware("auth:api");
    Route::put("{to_do}", \App\Http\Controllers\ToDoController::class . "@update")->middleware("auth:api");
    Route::delete("{to_do}", \App\Http\Controllers\ToDoController::class . "@destroy")->middleware("auth:api");
});

//Route::prefix("todo")->middleware("guest")
//    ->resource("to-do", \App\Http\Controllers\ToDoController::class)
//    ->except(["create", "edit"]);
