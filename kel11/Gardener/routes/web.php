<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Web\KoperasiController;
use App\Http\Controllers\Web\PulsaController;

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
    return view('pages.auth.main');
});

Route::get('auth',[AuthController::class, 'index'])->name('auth.index');
Route::get('login',[AuthController::class, 'index'])->name('login');
    Route::prefix('auth')->name('auth.')->group(function(){
        Route::post('login',[AuthController::class, 'do_login'])->name('login');
        Route::post('register',[AuthController::class, 'do_register'])->name('register');
    });
    Route::group(['middleware' => ['auth']], function () {
        Route::get('logout',[AuthController::class, 'do_logout'])->name('auth.logout');
        Route::resource('user',UserController::class);
        Route::resource('crud',CrudController::class);
        Route::resource('koperasi',KoperasiController::class);
        Route::resource('datapulsa',PulsaController::class);
    });