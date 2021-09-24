<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostsController;

Route::get('/', [PagesController::class, 'index']);

Route::resource('/blog', PostsController::class);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/search/query', [SearchController::class, 'query']);
