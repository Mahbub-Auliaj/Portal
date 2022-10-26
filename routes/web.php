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
    return view('bangka.map1');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/', 'PlaceMapController@index')->name('frontpage');
Route::get('/place/data', 'DataController@places')->name('place.data'); // DATA TABLE CONTROLLER

Route::get('/bangkamap', 'PlaceMapBangkaController@index')->name('front_page');
Route::get('/bangka/data', 'DataBangkaController@places')->name('bangka.data'); // DATA TABLE CONTROLLER

Route::group(['middleware' => ['auth']], function () {
    Route::resource('places', 'PlaceController');
    Route::resource('loc_bangka', 'PlaceBangkaController');
});