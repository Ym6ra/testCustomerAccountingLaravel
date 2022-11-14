<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers;
use Illuminate\Support\Facades\View;


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
Route::get('/page/{currentPage}', 'CreateController@ClientAllData')->name('AllData');

Route::get('/createClient', function () {
    return view('createСlient');
})->name('createClient');

Route::get('/updateСlient/{id}', 'UpdateController@updateClient')->name('updateСlientData');

Route::post('/updateClient/{id}', 'UpdateController@submitUpdateClient')->name('successUpdateClient');

Route::get('/createAuto/{id}', 'CreateController@ClientData')->name('createAuto');

Route::post('/createClient', 'CreateController@submitClient')->name('successCreateClient');

Route::post('/createAuto', 'CreateController@submitAuto')->name('successCreateAuto');

Route::get('/client/{id}', 'CreateController@oneClient')->name('oneClientData');

Route::get('/client/{id}/delete', 'DeleteController@deleteClient')->name('deleteClient');

Route::post('/page/{currentPage}', 'UpdateController@updateStatus')->name('updateStatus');

Route::get('/auto/{id}/delete', 'DeleteController@deleteAuto')->name('deleteAuto');


