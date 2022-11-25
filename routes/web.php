<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
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
//Route::get('/',Function(){
//    return redirect()->route('AllData', 1);
//});

Route::get('/', 'ClientsController@ClientAllData')->name('AllData');


Route::get('/createClient', function () {
    return view('createСlient');
})->name('createClient');

Route::get('/statistic', 'AutosController@statistic')->name('statistic');

Route::get('/updateСlient/{id}', 'ClientsController@updateClient')->name('updateСlientData');

Route::post('/updateClient/{id}', 'ClientsController@submitUpdateClient')->name('successUpdateClient');

Route::get('/createAuto/{id}', 'AutosController@ClientData')->name('createAuto');

Route::get('/updateAuto/{id}', 'AutosController@updateAuto')->name('updateAuto');

Route::post('/updateAuto/{id}', 'AutosController@submitUpdateAuto')->name('succesUpdateAuto');

Route::post('/createClient', 'ClientsController@submitClient')->name('successCreateClient');

Route::post('/client/{id}', 'AutosController@submitAuto')->name('successCreateAuto');

Route::get('/client/{id}', 'ClientsController@oneClient')->name('oneClientData');

Route::get('/client/{id}/delete', 'ClientsController@deleteClient')->name('deleteClient');

Route::patch('/updateStatus/{id}', 'AutosController@updateStatus')->name('updateStatus');

Route::get('/auto/{id}/delete', 'AutosController@deleteAuto')->name('deleteAuto');


