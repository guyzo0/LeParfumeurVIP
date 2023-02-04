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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/show', [App\Http\Controllers\Auth\AdminController::class, 'show'])->name('admin_show');
Route::post('/admin/login', [App\Http\Controllers\Auth\AdminController::class, 'login'])->name('admin_login');

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin/index', [App\Http\Controllers\Auth\AdminController::class, 'index'])->name('admin');
    Route::get('/admin/logout', [App\Http\Controllers\Auth\AdminController::class, 'logout'])->name('admin_logout');
});
