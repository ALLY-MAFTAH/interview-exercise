<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/upload', [ExpectancyController::class, 'uploadFile'])->name('upload');
Route::get('/expectancy-data', [ExpectancyController::class, 'getExpectancyData'])->name('expectancy-data');
Route::get('/column-names', [ExpectancyController::class, 'getYears'])->name('column-names');
Route::get('/delete-all', [ExpectancyController::class, 'deleteAllData'])->name('delete-all');
