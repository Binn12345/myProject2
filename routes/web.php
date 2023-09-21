<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\ContentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',  [loginController::class, 'loginPage'])->name('login.index');

Route::get('/register',  [registerController::class, 'registration'])->name('register');
Route::post('/storeinfo',  [registerController::class, 'registrationinfo'])->name('storeinfo');

Route::post('/check', [loginController::class, 'login'])->name('/check');

Route::middleware(['adminSessions'])->group(function () {

    Route::get('a/', [loginController::class, 'index'])->name('adminindex');
    Route::get('a/logout', [loginController::class, 'logout'])->name('logout');
    
    Route::get('a/profile', [ContentController::class, 'profileIndex'])->name('profile');
    Route::get('a/accounts', [ContentController::class, 'accountsIndex'])->name('accounts');
});



