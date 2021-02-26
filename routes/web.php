  
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

Route::get('/', function () {
    return view('fronindex');
});

Route::get('oba', function () {
    return view('coba');
});


// frondend route
use App\Http\Controllers\FrontendController;
Route::resource('/',FrontendController::class);

Route::get('provinsi', function () {
    return view('layouts.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\ProvinsiController;
Route::resource('provinsi',ProvinsiController::class);

use App\Http\Controllers\KotaController;
Route::resource('kota',KotaController::class);

use App\Http\Controllers\KecamatanController;
Route::resource('kecamatan',KecamatanController::class);

use App\Http\Controllers\KelurahanController;
Route::resource('kelurahan',KelurahanController::class);

use App\Http\Controllers\RwController;
Route::resource('rw',RwController::class);

use App\Http\Controllers\TrackingController;
Route::resource('tracking',TrackingController::class);

use App\Http\Controllers\NegaraController;
Route::resource('negara',NegaraController::class);

use App\Http\Controllers\KasusController;
Route::resource('kasus',KasusController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
