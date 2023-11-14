<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        "erro_login" => false
    ]);
})->name('home');

Route::get('/area_admin', [UserController::class, 'index'])->name('index');
Route::get('/area_requests', [UserController::class, 'area_requests'])->name('area_requests');
Route::get('/block/{id}', [UserController::class, 'block'])->name('block');
Route::get('/unlock/{id}', [UserController::class, 'unlock'])->name('unlock');

Route::post('/login', [UserController::class, 'login']);
Route::post('/create', [UserController::class, 'store']);
Route::get('/request', [UserController::class, 'request'])->name('request');
Route::post('/signin', [UserController::class, 'signin']);
Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [UserController::class, 'update'])->name('update');

