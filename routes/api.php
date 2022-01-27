<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get("/user/{id}", [UsersController::class, 'getUser']);
Route::post("/user/{id}", [UsersController::class, 'updateUser']);
Route::put("/user", [UsersController::class, 'addUser']);
Route::delete("/user/{id}", [UsersController::class, 'deleteUser']);
Route::get("/users/query", [UsersController::class, 'getUsers']);
