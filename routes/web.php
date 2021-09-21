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

Route::get('/', 'HomeController@index');
Route::post('/submit_purchase','HomeController@submit_purchase')->name('submit_purchase');

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/product/edit/{id}', 'ProductController@edit')->name('edit_product');
    Route::post('/product/update/{id}', 'ProductController@update')->name('update_product');
});
