<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// 認証系ルーティング
Auth::routes();

// ログイン後、本一覧画面へリダイレクト
Route::get('/home', function () {
    return redirect('/MyBook/book');
});

// 本の画面のルーティング
Route::get('/MyBook/book', [BookController::class, 'index'])->middleware('auth');
Route::get('/MyBook/book/{id}', [BookController::class, 'show'])->where('id', '[0-9]+')->middleware('auth');
Route::get('/MyBook/book/{id}/edit', [BookController::class, 'edit'])->where('id', '[0-9]+')->middleware('auth');
Route::post('/MyBook/book/update', [BookController::class, 'update'])->middleware('auth');
Route::get('/MyBook/book/toInsert', [BookController::class, 'toInsert'])->middleware('auth');
Route::post('/MyBook/book/insert', [BookController::class, 'store'])->middleware('auth');
Route::delete('/MyBook/book/{id}', [BookController::class, 'destroy'])->where('id', '[0-9]+')->middleware('auth');

// ユーザ画面のルーティング
Route::get('/MyBook/mypage/{id}', [UserController::class, 'toMypage'])->where('id', '[0-9]+')->middleware('auth');
Route::get('/MyBook/mypage/{id}/edit', [UserController::class, 'toRegisterProfile'])->where('id', '[0-9]+')->middleware('auth');
Route::post('/MyBook/mypage/profile/update', [UserController::class, 'updateProfile'])->middleware('auth');
