<?php

use App\Http\Controllers\BuktiPembayaranController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\KarcisController;
use App\Http\Controllers\LayoutsController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PesananDetailController;
use App\Http\Controllers\PesanFasilitasController;
use App\Http\Controllers\PesanKarcisController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RgistrasiLoginController;
use App\Http\Controllers\UserController;
use App\Models\PesananDetail;
use GuzzleHttp\Middleware;

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

// Route untuk masuk di LayoutsController
Route::get('/', [LayoutsController::class, 'index']);
Route::get('/about', [LayoutsController::class, 'about']);
Route::get('/contact', [LayoutsController::class, 'contact']);
Route::get('/gallery', [LayoutsController::class, 'gallery']);

// Route untuk masuk di RgistrasiLoginController
Route::get('/login', [RgistrasiLoginController::class, 'login'])->name('login')->middleware('guest');
Route::get('/registrasi', [RgistrasiLoginController::class, 'registrasi'])->middleware('guest');
Route::post('/registrasi', [RgistrasiLoginController::class, 'registrasiProses'])->middleware('guest');
Route::post('/login', [RgistrasiLoginController::class, 'loginProses'])->middleware('guest');
Route::post('/logout', [RgistrasiLoginController::class, 'logout']);

// Route untuk dashboard
Route::get('/dashboard', function() {
    return view('dashboard.index', [
        'title' => 'dashboard admin'
    ]);
})->middleware('admin');

// Route untuk masuk di CategoryController
Route::resource('/category-fasilitas', CategoryController::class)->middleware('admin');

// Route untuk masuk di KarcisCOntrollr
Route::resource('/data-karcis', KarcisController::class)->middleware('admin');

// Route untuk masuk di FasilitasCOntroller
Route::resource('/data-fasilitas', FasilitasController::class)->middleware('admin');

// Route untuk masuk di PesananController
Route::get('/data-pesanan', [PesananController::class, 'index'])->middleware('admin');
Route::get('/detail-pesanan-user/{id}', [PesananController::class, 'detailPesanan'])->middleware('admin');

// Route untuk masuk di PesanFasilitasController
Route::get('/pesan-fasilitas/{fasilitas:id}', [PesanFasilitasController::class, 'index'])->middleware('auth');
Route::post('/pesan-fasilitas/{fasilitas:id}', [PesanFasilitasController::class, 'pesanFasilitas'])->middleware('auth');
Route::get('/pesanan-fasilitas-user', [PesanFasilitasController::class, 'pesananFasilitas'])->middleware('auth');

// Route untuk masuk di PesanKarcisCOntroller
Route::get('/pesan-karcis/{karcis:id}', [PesanKarcisController::class, 'index'])->middleware('auth');
Route::post('/pesan-karcis', [PesanKarcisController::class, 'pesanKarcis'])->middleware('auth');
Route::get('/pesanan-karcis', [PesanKarcisController::class, 'pesananKarcis'])->middleware('auth');

// Route untuk masuk di PesananDetailsController
Route::get('/detail-pesanan/{id}', [PesananDetailController::class, 'index'])->middleware('auth');
Route::get('/hapus-pesanan/{id}', [PesananDetailController::class, 'destroy'])->middleware('auth');

// Route untuk masuk di CheckoutController
Route::get('/checkout/{pesanan:id}', [CheckoutController::class, 'checkout'])->middleware('auth');
Route::get('/history-pemesanan', [CheckoutController::class, 'historyPemesanan'])->middleware('auth');
Route::get('/detail-history-pesanan/{id}', [CheckoutController::class, 'detailHistory'])->middleware('auth');
Route::post('/upload-bukti-tf', [CheckoutController::class, 'upload'])->middleware('auth');
Route::get('/data-users', [CheckoutController::class, 'user'])->middleware('admin');
Route::get('/cetak-pemesanan/{id}', [CheckoutController::class, 'cetakPesanan'])->middleware('auth');

// Route untuk masuk di BuktiPembayaranController
Route::get('/data-bukti-transfer', [BuktiPembayaranController::class, 'index'])->middleware('admin');
