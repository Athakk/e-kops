<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\StokKeluarController;
use App\Http\Controllers\StokMasukController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

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

Route::controller(AuthController::class)->group(function () 
{
    Route::middleware('guest')->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'authenticate')->name('authenticate');
        Route::get('/register', 'register')->name('register');
        Route::post('/register', 'createRegister')->name('createRegister');
    });
    Route::get('/logout', 'logout')->name('logout')->middleware('auth');
});

Route::group(['middleware' => 'auth'], function(){
    Route::middleware('admin')->prefix('admin')->group(function() {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/', 'index')->name('dashboard');
        });
        
        Route::resources([
            'user' => UserController::class,
            'satuan' => SatuanController::class,
            'kategori' => KategoriController::class,
            'barang' => BarangController::class,
            'stok-masuk' => StokMasukController::class,
            'stok-keluar' => StokKeluarController::class,
        ]);
    });
});



