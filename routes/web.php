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


Route::get('', ['uses' => 'SiteController@index', 'as' => 'index']);
Route::get('/', ['uses' => 'SiteController@index', 'as' => '/']);
Route::get('index', ['uses' => 'SiteController@index', 'as' => 'index']);

Route::get('product-details/{id}', 'SiteController@get_product_details')->name('product-details');
