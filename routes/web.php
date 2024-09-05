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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', [App\Http\Controllers\HelloController::class, 'index'])->name('home');
Route::post('/office/store/html', [App\Http\Controllers\HelloController::class,'store_html'])->name('office.store.html');
Route::post('/office/store/ajax', [App\Http\Controllers\HelloController::class,'store_ajax'])->name('office.store.ajax');
Route::get('/office/{id}/edit', [App\Http\Controllers\HelloController::class, 'edit'])->name('office.edit');
Route::put('/office/{id}/update', [App\Http\Controllers\HelloController::class, 'update'])->name('office.update');
Route::delete('/office/{id}/delete', [App\Http\Controllers\HelloController::class, 'destroy'])->name('office.destroy');
Route::get('/office/{id}/restore', [App\Http\Controllers\HelloController::class,'restore'])->name('office.restore');

Route::post('/memo/{id}', [App\Http\Controllers\HelloController::class, 'store_memo'])->name('memo.store');

Route::get('/login', [App\Http\Controllers\HelloController::class,'login_index'])->name('login.index');
Route::post('/action/login', [App\Http\Controllers\HelloController::class,'login_action'])->name('login.action');
Route::get('/register', [App\Http\Controllers\HelloController::class,'register_index'])->name('register.index');
Route::post('/action/register', [App\Http\Controllers\HelloController::class,'register_action'])->name('register.action');

