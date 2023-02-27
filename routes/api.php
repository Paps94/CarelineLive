<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DeviceController;
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

//It's a good idea to add a prefix to api routes in case of changes in the future
Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
    // Route::get('/user', function (Request $request) {
    //     return $request->user();
    // });
});

//Set up our routes (for the case of this test they don't need to be wrapped in a middleware)
//Additionally I will only use resournce for users and devices just to showcase that there are
//multiple ways of handling controllers (Directly using Eloquent or through Resources)
Route::apiResource('users', UserController::class);
Route::apiResource('devices', DeviceController::class);
