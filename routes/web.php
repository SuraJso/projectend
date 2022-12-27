<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use RealRashid\SweetAlert\Facades\Alert;


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
    return view('/index');
})->name('home1');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['is_admin','auth'])->group(function () {
    Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminhome'])->name('admin.home');

    Route::get('admin/product', [\App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.product');
    Route::get('admin/insertproduct', [\App\Http\Controllers\Admin\ProductController::class, 'viewinsertproduct'])->name('admin.insertproduct');

});
