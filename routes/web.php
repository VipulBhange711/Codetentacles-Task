<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImgController;
use Illuminate\Support\Facades\Route;


Route::get('/',[AuthController::class,'login'])->name('login.get');
Route::get('/reg',[AuthController::class,'register'])->name('register.get');

Route::post('/login',[AuthController::class,'login_post'])->name('login.post');
Route::post('/reg',[AuthController::class,'register_post'])->name('register.post');

Route::get('/welcome',[AuthController::class,'dashboard'])->name('dashboard.get');
Route::get('/logout',[AuthController::class,'logout'])->name('logout.get');

// Route::post('/addinfo',[AuthController::class,'addinfo_post'])->name('addinfo.post');

// Route::get('users', [AuthController::class, 'index'])->name('users.index');
// Route::get('users/{id}', [AuthController::class, 'show'])->name('users.show');

// Route::post('/changeinfo',[AuthController::class,'changeinfo_post'])->name('changeinfo.post');

// Route::get('/test',[AuthController::class,'test'])->name('test.get');

Route::POST('/upload',[ImgController::class,'upload'])->name('upload.post');
Route::DELETE('/delete/{id}',[ImgController::class,'delete'])->name('delete.post');
Route::POST('/update',[ImgController::class,'update'])->name('update.post');
