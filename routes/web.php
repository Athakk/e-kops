<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BeliController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\StokKeluarController;
use App\Http\Controllers\StokMasukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserFrontController;
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

Route::controller(AuthController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'authenticate')->name('authenticate');
        Route::get('/register', 'register')->name('register');
        Route::post('/register', 'createRegister')->name('createRegister');
    });
    Route::get('/logout', 'logout')->name('logout')->middleware('auth');
});

    Route::middleware('auth')->group(function() {
        Route::controller(UserFrontController::class)->group(function () {
            Route::get('/home', 'home')->name('home');
            Route::get('/toko', 'toko')->name('toko');
            Route::get('/item-detail/{barang}', 'itemDetail')->name('item-detail');
            Route::get('/toko/search/{barang}', 'tokoSearch')->name('toko.search');
            Route::get('/pesananHistory', 'pesananHistory')->name('pesananHistory');
            Route::get('/pesananHistory/detail/{pesanan}', 'pesananHistoryDetail')->name('pesananHistory.detail');
            Route::post('/searchItem', 'searchItem')->name('searchItem');
            Route::get('/searchItem/kategori/{id}', 'searchItemKategori')->name('searchItem.kategori');
        });

        Route::controller(KeranjangController::class)->group(function () {
            Route::get('/addKeranjang/{barang}', 'addKeranjang')->name('addKeranjang');
        });
        
        Route::controller(BeliController::class)->group(function () {
            Route::post('/beliFromDetail/{barang}', 'beliFromDetail')->name('beliFromDetail');
            Route::post('/midtrans-callback', 'callBack')->name('callBack');
            Route::delete('/PesananDetail/{pesananDetail}', 'destroyPesananDetail')->name('PesananDetail.destroy');
            Route::delete('/Pesanan/{pesanan}', 'destroyPesanan')->name('Pesanan.destroy');
        });

    });

    Route::middleware('admin')->group(function() {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/', 'index')->name('dashboard');
        });
        Route::prefix('admin')->group(function() {
            Route::controller(PesananController::class)->group(function () {
                Route::get('/pesanan', 'index')->name('pesanan');
                Route::get('/pesanan/detail/{pesanan}', 'detail')->name('pesanan.detail');
                Route::get('/pesanan/statusDone/{pesanan}', 'statusDone')->name('pesanan.statusDone');
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
    
    

