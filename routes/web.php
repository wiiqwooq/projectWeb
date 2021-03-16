<?php

use App\Http\Controllers\attractionsController;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use App\Image_Tourist_Attraction;
use Illuminate\Support\Facades\Auth;

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

Route::get('/testregister', 'Auth\RegisterController@test');

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admins', 'adminsController');
Route::get('/editpassword/{id}', 'adminsController@editPassword')->name('admins.editpassword');
Route::put('/updatepassword/{id}', 'adminsController@updatePassword')->name('admins.updatepassword');

Route::resource('attractions', 'attractionsController');
Route::delete('deleteimg/{id}', 'attractionsController@destroyImage');

Route::resource('users', 'usersController');

Route::resource('trips', 'tripsController');
Route::delete('/deletetrip/{id}', 'tripsController@deleteTrip')->name('trips.delete');

Route::resource('confirm', 'confirmsController');

Route::resource('/history', 'sellController');

Route::resource('/reports', 'reportController');
Route::get('/getreport', 'reportController@getSellReport')->name('get.report');
Route::get('/gettopreport', 'reportController@getTopReport')->name('get.topreport');
Route::post('/reportSell/pdf', 'reportController@createSellingPDF')->name('export.selling');
Route::post('/reporttopSell/pdf', 'reportController@createTopTripPDF')->name('export.toptrips');

Route::get('/logout', 'Auth\LoginController@logout');
Auth::routes();
