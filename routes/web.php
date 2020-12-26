<?php

use App\Http\Controllers\attractionsController;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use App\Image_Tourist_Attraction;

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
    return view('users.users');
});
Route::resource('admins', 'adminsController');
Route::resource('attractions', 'attractionsController');
Route::delete('deleteimg/{id}', function ($id) {
    Image_Tourist_Attraction::find($id)->delete();
    return back();
});
Route::resource('trips', 'tripsController');



Route::get('/confirm', function () {
    return view('comfirm.confirm');
});
Route::get('/history', function () {
    return view('history.history');
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

