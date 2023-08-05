<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Articles Routes
Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/detail/{id}', [ArticleController::class, 'detail']);
Route::get('/articles/add', [ArticleController::class, 'add']);
Route::post('/articles/add', [ArticleController::class, 'create']);
Route::get('/articles/delete/{id}', [ArticleController::class, 'delete']);

// Comments Routes
Route::post('/comments/add', [CommentController::class, 'create']);
Route::get('/comments/delete/{id}', [CommentController::class, 'delete']);

// Category Routes
Route::get('/categories', [CategoryController::class, 'index']);