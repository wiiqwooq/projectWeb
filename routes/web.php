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

Route::resource('attractions', 'attractionsController');
Route::resource('users', 'usersController');

Route::delete('deleteimg/{id}', 'attractionsController@destroyImage');

Route::resource('trips', 'tripsController');

Route::get('/confirm', function () {
    return view('comfirm.confirm');
});

Route::get('/history', function () {
    return view('history.history');
});

Route::get('/reports', function () {
    return view('repotrs.report');
});


Route::get('/testCarbon',function(){
    Carbon::now();
    $str = "";
    for($i=0;$i<5;$i++) {
        $str .= time() . "<br>";
    }
    return $str;
});

Route::get('/testaddrow',function(){
    return view('Trips.test_add_row');
});

Route::get('/logout','Auth\LoginController@logout');

Route::delete('/deletetrip/{id}','tripsController@deleteTrip')->name('trips.delete');

Auth::routes();


