<?php

use Illuminate\Support\Facades\Route;

$controllerLink = 'App\Http\Controllers';
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
Auth::routes();

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('testDB', $controllerLink.'\TestDB@index');

Route::get('/', $controllerLink.'\datasheetController@showDocs');       //index page
Route::get('/home', $controllerLink.'\datasheetController@showDocs');   //index page

Route::get('/logout', $controllerLink.'\Auth\LoginController@logout');  //log out

Route::post('/subDocs', $controllerLink.'\insertController@storeDocument');  //Input new Docs
Route::post('/subStas', $controllerLink.'\insertController@storeStation');  //Input new Station
Route::post('/subRooms', $controllerLink.'\insertController@storeRoom');  //Input new Station
Route::post('updatepdf/upDocs', $controllerLink.'\updateController@upDocument');   //update documents
    
Route::get('pdf1/{id}',[         // open pdf file in new tab::Not using this
    'as'=>'showpdf1',
    'uses'=>$controllerLink.'\datasheetController@showpdf'
])->middleware('auth');

// open pdf file in new tab::Uing this
Route::get('pdf/{id}', $controllerLink.'\datasheetController@getDocument')->name('showpdf')->middleware('auth'); 

// Update info of pdf file
Route::get('updatepdf/{id}', $controllerLink.'\datasheetController@updatePDF')->name('updatepdf')->middleware('auth'); 