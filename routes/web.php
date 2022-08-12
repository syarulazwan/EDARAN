<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;


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


Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'loginView');
    Route::get('/home', 'index');
    Route::get('/loginView', 'loginView');
    Route::get('/domainView', 'domainView');
    Route::get('/registerView', 'registerView');
    Route::get('/verifiedView/{id}', 'verifiedView');
    Route::get('/forgotPassView', 'forgotPassView');
    Route::get('/resetPassView/{id}', 'resetPassView');
    Route::get('/resetDomainView', 'resetDomainView');
});
