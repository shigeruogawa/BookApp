<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use App\Http\Middleware\BookFormRequest;
use App\Http\Requests\BookFormRequest;


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

Route::get('/MyBook/book', 'App\Http\Controllers\BookController@index')->middleware('auth');
Route::get('/MyBook/book/toInsert', 'App\Http\Controllers\BookController@toInsert')->middleware('auth');
Route::get('/MyBook/book/{id}', 'App\Http\Controllers\BookController@show')->where('id', '[0-9]+')->middleware('auth');
Route::get('/MyBook/book/{id}/edit', 'App\Http\Controllers\BookController@edit')->where('id', '[0-9]+')->middleware('auth');
Route::post('/MyBook/book/insert', 'App\Http\Controllers\BookController@store')->middleware('auth');
Route::post('/MyBook/book/{id}', 'App\Http\Controllers\BookController@update')->where('id', '[0-9]+')->middleware('auth');
Route::delete('/MyBook/book/{id}', 'App\Http\Controllers\BookController@destroy')->where('id', '[0-9]+')->middleware('auth');
Route::get('/MyBook/mypage/{id}', 'App\Http\Controllers\BookController@toMypage')->where('id', '[0-9]+')->middleware('auth');

Auth::routes();
// Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
