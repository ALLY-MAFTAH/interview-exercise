<?php

use App\Http\Controllers\ExpectancyController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/upload', [ExpectancyController::class, 'uploadFile']);
Route::get('/expectancy-data', [ExpectancyController::class, 'getExpectancyData']);
Route::get('/column-names', [ExpectancyController::class, 'getYears']);
Route::get('/delete-all', [ExpectancyController::class, 'deleteAllData']);
