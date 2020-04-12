<?php

use Illuminate\Http\Request;
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

Route::apiResource('pilar','Api\PilarController');
Route::get('pilar2','Api\PilarController@index2');
Route::get('pertanyaan2','Api\PertanyaanController@index2');
Route::apiResource('indikator','Api\IndikatorController');
Route::get('indikator2','Api\IndikatorController@index2');
Route::apiResource('pertanyaan','Api\PertanyaanController');
Route::apiResource('provinsi','Api\ProvinsiController');
Route::get('provinsi2','Api\ProvinsiController@index2');
Route::get('kota2','Api\ProvinsiController@index3');
Route::apiResource('kota','Api\KotaController');
Route::apiResource('kabupaten','Api\KabupatenController');
Route::apiResource('lembaga','Api\LembagaController');
Route::apiResource('users','Api\UserController');
Route::apiResource('pilihan','Api\PilihanController');
Route::put('profile', 'Api\UserController@updateProfile');
Route::get('profile', 'Api\UserController@profile');
Route::apiResource('pdpt','Api\LembagaProfileController');
Route::apiResource('kode','Api\Get');
Route::get('lembaga/{slug}',['as'=> 'lembaga.slug','uses'=>'Api\LembagaController@kode']);