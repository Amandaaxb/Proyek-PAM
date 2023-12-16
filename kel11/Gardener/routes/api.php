<?php

use App\Http\Controllers\API\ApiCustomerController;
use App\Http\Controllers\API\ApiKoperasiController;
use App\Http\Controllers\API\ApiPulsaController;
use App\Http\Controllers\API\ApiRuanganController;
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

//Users
Route::post('/registrasi', [ApiCustomerController::class, 'do_register']);
Route::post('login', [ApiCustomerController::class, 'do_login']);

//Koperasi
Route::apiResource('/datakoperasi', ApiKoperasiController::class);

//Pulsa
Route::apiResource('/pulsa', ApiPulsaController::class);

//Ruangan
Route::apiResource('/ruangan', ApiRuanganController::class);