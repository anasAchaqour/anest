<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/in', function () {
    return view('sign-in-up.sign_in');
});
Route::get('/up', function () {
    return view('sign-in-up.sign_up');
});
Route::get('/', function () {
    return view('test');
});


