<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\LinkController;
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
    return view('welcome');
});

Route::get('/generate-link', 'LinkController@index');
Route::post('/generate-link', 'LinkController@store')->name('generate.link.post');
Route::get('/{code}', 'LinkController@shortenLink')->name('shorten.link');