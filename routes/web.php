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
//AUTH
use App\Http\Controllers\Auth\LoginController as Auths;
use App\Http\Controllers\AuthController as Authz;

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/auth/login', [Auths::class, 'index']);
// Route::post('/auth/login', [Auths::class, 'login'])->name('login');
Route::get('/auth/logout', [Auths::class, 'logout'])->name('logout');

Route::get('/login', [Authz::class, 'login'])->name('login');
Route::post('/proses-login', [Authz::class, 'prosesLogin']);
// Route::get('/register', [Authz::class, 'register']);
// Route::post('/register', [Authz::class, 'registerCreate']);


Route::group(['prefix' => '',  'namespace' => 'App\Http\Controllers\Admin',  'middleware' => ['auth']], function () {
    Route::group(['prefix' => 'admin'], function () {

        Route::get('/', 'DashboardController@index')->name('dashboard');

        Route::group(['prefix' => '/produk'], function () {
            Route::get('/', 'ProdukController@index')->name('produk');
            Route::get('/data', 'ProdukController@data')->name('produk.data');
            Route::post('/store', 'ProdukController@store')->name('produk.store');
            Route::get('/{id}/edit', 'ProdukController@show')->name('produk.edit');
            Route::post('/{id}', 'ProdukController@update')->name('produk.update');
            Route::delete('/{id}', 'ProdukController@destroy')->name('produk.delete');
        });

        Route::group(['prefix' => '/transaksi'], function () {
            Route::get('/', 'TransaksiController@index')->name('transaksi');
            Route::get('/data', 'TransaksiController@data')->name('transaksi.data');
            Route::post('/store', 'TransaksiController@store')->name('transaksi.store');
            Route::get('/{id}/edit', 'TransaksiController@show')->name('transaksi.edit');
            Route::post('/{id}', 'TransaksiController@update')->name('transaksi.update');
            Route::delete('/{id}', 'TransaksiController@destroy')->name('transaksi.delete');
        });
        Route::group(['prefix' => '/laporan'], function () {
            Route::get('/', 'LaporanController@index')->name('transaksi');
            Route::get('/data', 'LaporanController@data')->name('transaksi.data');
            Route::post('/store', 'LaporanController@store')->name('transaksi.store');
            Route::get('/{id}/edit', 'LaporanController@show')->name('transaksi.edit');
            Route::post('/{id}', 'LaporanController@update')->name('transaksi.update');
            Route::delete('/{id}', 'LaporanController@destroy')->name('transaksi.delete');
        });
    });
});

Route::get('/', [App\Http\Controllers\Apps\HomeController::class, 'index'])->name('home');
Route::get('/wisata', [App\Http\Controllers\Apps\WisataController::class, 'wisata'])->name('wisata');
Route::get('/wisata/detail/{id}', [App\Http\Controllers\Apps\WisataController::class, 'detail_wisata'])->name('wisata.detail');
Route::post('/wisata/detail/{id}/comment', [App\Http\Controllers\Apps\WisataController::class, 'storeComment'])->name('wisata.comment.store');

Route::get('/sejarah-budaya', [App\Http\Controllers\Apps\SejarahController::class, 'sejarah'])->name('sejarah');
Route::get('/sejarah-budaya/detail/{id}', [App\Http\Controllers\Apps\SejarahController::class, 'detail_sejarah'])->name('sejarah.detail');

Route::get('/kegiatan', [App\Http\Controllers\Apps\KegiatanController::class, 'kegiatan'])->name('kegiatan');
Route::get('/kegiatan/detail/{id}', [App\Http\Controllers\Apps\KegiatanController::class, 'detail_kegiatan'])->name('kegiatan.detail');

Route::get('/kategori/{id}', [App\Http\Controllers\Apps\KategoriController::class, 'index'])->name('kategori');

Route::get('/galeri', [App\Http\Controllers\Apps\GaleriController::class, 'galeri'])->name('galeri');


Route::get('/cc', function () {
    // Artisan::call('migrate');
    // Artisan::call('migrate:fresh');
    // Artisan::call('db:seed');
    Artisan::call('optimize:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
});
