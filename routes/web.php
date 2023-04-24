<?php

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

Route::get('/',[App\Http\Controllers\HomeController::class, 'index']);

Route::get('/ventas',function(){return view('own.ventas');});
Route::get('/ordenes',function(){return view('own.ordenes');});

Route::get('myCar',function(){return view('myCar');})->name('myCar');

Auth::routes();

Route::get('/home', [App\Http\Controllers\OrdersController::class, 'index'])->name('home');
Route::post('/comprar', [App\Http\Controllers\OrdersController::class, 'create'])->name('comprar');

