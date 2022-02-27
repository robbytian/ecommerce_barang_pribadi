<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileKaryaController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return redirect('/login');
});
Route::get('/register', [AuthController::class, 'registerPage']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'loginPage'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->middleware('guest');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/karya', [FileKaryaController::class, 'karya']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/home', [StoreController::class, 'index']);
    Route::get('/product', [StoreController::class, 'productList']);
    Route::get('/product/{id}/detail', [StoreController::class, 'detailProduct']);
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/barang', BarangController::class);
    Route::get('/penjualan', [DashboardController::class, 'penjualan']);
    Route::get('/pembelian', [DashboardController::class, 'pembelian']);
});
