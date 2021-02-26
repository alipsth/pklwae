<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ProvinsiController;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\RwController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/rw',[RwController::class,'index']);
//Api Crud Provinsi
// Route::get('/provinsi',[ProvinsiController::class,'provinsi']);
// Route::post('/provinsi/store',[ProvinsiController::class,'store']);
// Route::get('/provinsi/{id?}',[ProvinsiController::class,'show']);
// Route::post('/provinsi/update/{id?}',[ProvinsiController::class,'update']);
// Route::delete('/provinsi/{id?}',[ProvinsiController::class,'destroy']);

//Api Crud Api
Route::get('/rw',[ApiController::class,'rw']);
Route::get('/prov',[ApiController::class,'provinsi']);
Route::get('/kota',[ApiController::class,'kota']);
Route::get('/kec',[ApiController::class,'kecamatan']);
Route::get('/kel',[ApiController::class,'kelurahan']);
Route::get('/all',[ApiController::class,'Seluruh']);
Route::get('/pos',[ApiController::class,'positif']);
Route::get('/sem',[ApiController::class,'sembuh']);
Route::get('/men',[ApiController::class,'meninggal']);
Route::get('/dunya',[ApiController::class,'dunya']);
// Route::post('/api/store',[ApiController::class,'store']);
// Route::get('/api/{id?}',[ApiController::class,'show']);
// Route::post('/api/update/{id?}',[ApiController::class,'update']);
// Route::delete('/api/{id?}',[ApiController::class,'destroy']);
