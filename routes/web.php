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


Route::get('/','SpaController@index');
Auth::routes();

// Route::get('/dasbor', 'HomeController@index')->name('dasbor');
// Route::get('/profil', 'Api\LembagaProfileController@index')->name('profil');
// Route::get('/pengguna', 'Api\UserController@skuy')->name('skuy')->middleware('auth');
// Route::get('/indikator', 'Api\IndikatorController@skuy')->name('skuyliving')->middleware('auth');
// Route::resource('ajaxproducts','ProductAjaxController');

Route::get('/{any}','HomeController@index')->where(' any', '.*');
