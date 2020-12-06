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
    return view('users.users');
});

Route::get('/attractions', function () {
    return view('attractions.add_attraction');
});
Route::get('/users', function () {
    return view('users.users');
});
Route::resource('admins', 'adminsController');
Route::get('/attractions', function () {
    return view('attractions.attractions');
});
Route::get('/trips', function () {
    return view('trips.trips');
});
Route::get('/confirm', function () {
    return view('comfirm.confirm');
});
Route::get('/history', function () {
    return view('history.history');
});
Route::get('/reports', function () {
    return view('repotrs.report');
});
Route::get('/create_admins', function () {
    return view('Admins.create_admins');
});

