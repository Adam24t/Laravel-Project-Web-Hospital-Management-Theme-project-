<?php

use App\Http\Controllers\daftartagihanController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\dokterController;
use App\Http\Controllers\perawatController;
use App\Http\Controllers\ruanganController;
use App\Http\Controllers\pasienController;
use App\Http\Controllers\rawatinapController;
use App\Http\Controllers\obatController;
use App\Http\Controllers\diagnosaController;
use App\Http\Controllers\bookingController;
use App\Http\Controllers\spesialisasidokterController;
use App\Http\Controllers\spesialisasiperawatController;
use App\Http\Controllers\tagihanController;
use App\Http\Controllers\testController;
use App\Http\Controllers\loginController;

use App\Http\Controllers\chart_index;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\DatabaseDisplaysController;


use Illuminate\Support\Facades\Route;

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

// Admin or User Login





// web page Routes

Route::get('/login', [loginController::class,'index']);
Route::post('/login',[loginController::class,'authenticate'])->name('login');

Route::get('/dokter', [dokterController::class,'index']);
Route::match(['get', 'post'],'/add-dokter',[dokterController::class,'store'])->name('doctor.add');
Route::match(['get', 'post'],'/add-spesialisasi-dokter',[spesialisasidokterController::class,'store'])->name('spesialisasid.add');

Route::get('/perawat', [perawatController::class,'index']);
Route::match(['get', 'post'],'/add-perawat',[perawatController::class,'store'])->name('perawat.add');
Route::match(['get', 'post'],'/add-spesialisasi-perawat',[spesialisasiperawatController::class,'store'])->name('spesialisasip.add');

Route::get('/ruangan', [ruanganController::class,'index']);
Route::match(['get', 'post'],'/add-ruangan',[ruanganController::class,'store'])->name('ruangan.add');

Route::get('/pasien', [pasienController::class,'index']);
Route::match(['get', 'post'],'/add-pasien',[pasienController::class,'store'])->name('pasien.add');

Route::get('/rawat_inap', [rawatinapController::class,'index']);
Route::match(['get', 'post'],'/add-ri',[rawatinapController::class,'store'])->name('rawatinap.add');

Route::get('/obat', [obatController::class,'index']);
Route::match(['get', 'post'],'/add-obat',[obatController::class,'store'])->name('obat.add');

Route::get('/diagnosa', [diagnosaController::class,'index']);
Route::match(['get', 'post'],'/add-diagnosa',[diagnosaController::class,'store'])->name('diagnosa.add');

Route::get('/booking', [bookingController::class,'index']);
Route::match(['get', 'post'],'/add-booking',[bookingController::class,'store'])->name('booking.add');

Route::get('/daftar_tagihan', [daftartagihanController::class,'index']);
Route::match(['get', 'post'],'/add-daftar-tagihan',[daftartagihanController::class,'store'])->name('daftartagihan.add');

Route::get('/tagihan', [tagihanController::class,'index']);
Route::match(['get', 'post'],'/add-tagihan',[tagihanController::class,'store'])->name('tagihan.add');

Route::get('/', [dashboardController::class, 'index'])->name('dashboard');;



Route::get('/test', [testController::class,'index']);




