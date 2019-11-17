<?php

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
    return view('frontend.welcome');
})->name('front');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/admin', 'Admin\AdminController@index')->name('admin');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/login', ['as' => 'showlogin', 'uses' => 'Admin\LoginController@index']);
    Route::post('/login', ['as' => 'login', 'uses' => 'Admin\LoginController@login']);
    Route::post('/logout', ['as' => 'logout', 'uses' => 'Admin\LoginController@logout']);
    Route::get('/', ['as' => 'dashboard', 'uses' => 'Admin\AdminController@index']);
});
