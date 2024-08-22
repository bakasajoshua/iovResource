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
    return view('iov_welcome');
});
Route::get('events', function () {
    return view('events');
})->name('events');

Route::get('sermons', function () {
    return view('sermons');
});

Route::get('publications', function () {
    return view('publications');
});
