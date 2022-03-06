<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\SaveController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\IPController;

use App\Http\Controllers\EditDataProductController;
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



Route::get('/',[HomeController::class,'indexhomepage'])->name('homepages');

Route::get('/home',[HomeController::class,'indexhome'])->name('home');
Route::get('/home/links={id}',[HomeController::class,'getDataLink'])->name('homelink');

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'login'])->name('login');
Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'register'])->name('register');
Route::get('/profile',[ProfileController::class,'index'])->name('profile');
Route::post('/profile',[ProfileController::class,'updatename'])->name('profile');
Route::get('/create',[CreateController::class,'index']);
Route::post('/create',[CreateController::class,'create'])->name('create');
Route::post('/save',[SaveController::class,'save'])->name('save');
Route::get('/edit/links={id}',[SaveController::class,'edit'])->name('edit');
