<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers;


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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', function () {
    return view('home');
});

Route::get('/createClient', function () {
    return view('createСlient');
})->name('createClient');

Route::get('/update', function () {
    return view('updateClient');
})->name('updateClient');

Route::post('/createClientAuto', 'CreateController@submit')->name('successCreate');