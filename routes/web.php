<?php

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

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'create']);
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'store']);
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'destroy']);

Route::get('/register', [\App\Http\Controllers\RegistrationController::class, 'create']);
Route::post('/register', [\App\Http\Controllers\RegistrationController::class, 'store']);


Route::get('/', [\App\Http\Controllers\EventController::class, 'index']);
Route::get('/events/{event}', [\App\Http\Controllers\EventController::class, 'show']);
Route::get('/yourevents', [\App\Http\Controllers\EventController::class, 'organiserEvents']);
Route::get('/createevent', [\App\Http\Controllers\EventController::class, 'create']);
Route::post('/createevent', [\App\Http\Controllers\EventController::class, 'store']); 
Route::get('/editevent/{event}', [\App\Http\Controllers\EventController::class, 'edit']); 
Route::put('/editevent/{event}', [\App\Http\Controllers\EventController::class, 'update']);
Route::get('/events/updateinterest/{event}', [\App\Http\Controllers\EventController::class, 'updateInterest']); 
