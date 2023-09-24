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

Route::middleware(['adminSessions'])->prefix('admin')->group(function () {

    Route::get('/', [loginController::class, 'index'])->name('adminindex');
    Route::get('/logout', [loginController::class, 'logout'])->name('logout');
    
    Route::get('/profile',     [ContentController::class, 'profileIndex']) ->name('profile');
    Route::get('/accounts',    [ContentController::class, 'accountsIndex'])->name('accounts');
    Route::post('/storedata',  [ContentController::class, 'storedata'])    ->name('storedata');
    Route::get('/storeinfo',   [registerController::class, 'store'])       ->name('storeinfos');

    Route::post('/role',        [registerController::class, 'searchData'])  ->name('role');
    Route::post('/deleteRow',   [registerController::class, 'deleteData'])  ->name('deleteRow');
});



