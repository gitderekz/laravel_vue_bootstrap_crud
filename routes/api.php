<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\FlutterAuth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('api')->group(function () {
    Route::resource('clients', ClientsController::class);
});

Route::post('auth/register',[FlutterAuth::class, 'register']);
Route::post('auth/login',[FlutterAuth::class, 'login']);
// Route::get('/get_all_clients',[ClientsController::class, 'index']);
// Route::get('/create_clients',[ClientsController::class, 'create']);