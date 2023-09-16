<?php


use Illuminate\Support\Facades\Auth;
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

Route::get('/MyBook', 'App\Http\Controllers\BookController@index')->middleware('auth');
Route::get('/MyBook/toInsert', 'App\Http\Controllers\BookController@toInsert')->middleware('auth');
Route::get('/MyBook/{id}', 'App\Http\Controllers\BookController@show')->middleware('auth');
Route::get('/MyBook/{id}/edit', 'App\Http\Controllers\BookController@edit')->middleware('auth');
Route::post('/MyBook/insert', 'App\Http\Controllers\BookController@store')->middleware('auth');
Route::post('/MyBook/{id}', 'App\Http\Controllers\BookController@update')->middleware('auth');
Route::delete('/MyBook/{id}', 'App\Http\Controllers\BookController@destroy')->middleware('auth');
Route::get('/MyBook/my/page', 'App\Http\Controllers\BookController@toMypage')->middleware('auth');

Auth::routes();
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');


/*Route::get('/', 'App\Http\Controllers\BookController@index');*/

// Route::resource('/MyBook','App\Http\Controllers\RestappController');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::post('/home', 'App\Http\Controllers\HomeController@updtinfo');

// Route::get('/Mybook/session','App\Http\Controllers\BookController@ses_get');
// Route::post('/Mybook/session','App\Http\Controllers\BookController@ses_put');
// Route::resource('/MyBook', 'App\Http\Controllers\RestappController')
//     ->middleware('auth');
