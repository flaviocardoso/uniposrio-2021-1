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
    return view('home');
});
Route::get('/general-info', function () {
    return view('general-info');
});
Route::get('/recommendation-letter', function () {
    return view('recommendation-letter');
});
Route::get('/subscribes', function () {
    return view('discente.subscribes');
});
Route::get('/credits', function () {
    return view('credits');
});
Route::get('/new-subscribe', function () {
    return view('discente.new-subscribe');
});
Route::get('/redefine-password', function () {
    return view('discente.redefine-password');
});
Route::get('/docente', function () {
    return view('docente.docente');
});