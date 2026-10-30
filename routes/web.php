<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AlbumController;

// route login
Route::get('/login',[AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login',[AuthController::class,'login']);

//route solo se loggato
Route::middleware('auth')->group(function(){
    
    Route::post('/logout',[AuthController::class, 'logout'])->name('logout');
    Route::get('/',[AlbumController::class,'index'])->name('home');
    Route::resource('albums',AlbumController::class);

});


