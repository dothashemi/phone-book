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

Route::get('/', 'HomeController@index');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

Route::prefix('panel')->middleware('auth')->group(function () {

    Route::resource('/contacts', 'ContactController');

    Route::resource('/phones', 'PhoneController');

    Route::resource('/groups', 'GroupController');

    Route::get('/', 'ContactController@index');

    Route::get('/search/contacts', 'PanelController@searchContact')->name('search.contacts');

    Route::get('/search/phones', 'PanelController@searchPhone')->name('search.phones');
});
