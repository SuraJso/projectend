<?php

use App\Http\Controllers\Admin\TypeproductController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminStockController;
use App\Http\Controllers\AdminTypeUserController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UserProfileController;
use App\Models\Orders;
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

// Route::get('/', function () {
//     return view('/index');
// })->name('home1');

Route::get('/', [App\Http\Controllers\FrontController::class, 'home'])->name('home1');

Route::get('/reset', [App\Http\Controllers\EveryController::class, 'reset'])->name('reset');
Route::get('/home', [App\Http\Controllers\FrontController::class, 'home'])->name('home');
Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
Route::get('/category/{id}',[\App\Http\Controllers\CategoryController::class, 'edit'])->name('categorydetail.edit');
Auth::routes();


Route::middleware(['auth'])->group(function () {
    Route::post('/cart/store', [App\Http\Controllers\CartController::class, 'store'])->name('cart.store');
    Route::post('/cart/update/{order}', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
    Route::resource('profileuser', UserProfileController::class);
    Route::resource('checkout', CheckoutController::class);
    Route::resource('order', OrdersController::class);
});



Route::middleware(['is_admin','auth'])->group(function () {

    Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminhome'])->name('admin.home');
    Route::get('admin/product', [\App\Http\Controllers\Admin\ProductController::class,'index'])->name('admin.product');
    Route::get('admin/insertproduct', [\App\Http\Controllers\Admin\ProductController::class, 'viewinsertproduct'])->name('admin.insertproduct');
    Route::post('admin/insertproduct',[\App\Http\Controllers\Admin\ProductController::class, 'store']);
    Route::get('admin/insertproduct/{id}',[\App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('admin.insertproduct.edit');
    Route::post('admin/insertproduct/update/{id}',[\App\Http\Controllers\Admin\ProductController::class, 'update'])->name('admin.insertproduct.update');
    Route::get('admin/insertproduct/delete/{id}',[\App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('admin.insertproduct.delete');

    Route::get('admin/typeproduct', [\App\Http\Controllers\Admin\TypeproductController::class,'index'])->name('admin.typeproduct');
    Route::get('admin/inserttypeproduct', [\App\Http\Controllers\Admin\TypeproductController::class, 'viewinserttypeproduct'])->name('admin.inserttypeproduct');
    Route::post('admin/inserttypeproduct',[\App\Http\Controllers\Admin\TypeproductController::class, 'store']);
    Route::get('admin/inserttypeproduct/{id}',[\App\Http\Controllers\Admin\TypeproductController::class, 'edit'])->name('admin.inserttypeproduct.edit');
    Route::post('admin/inserttypeproduct/update/{id}',[\App\Http\Controllers\Admin\TypeproductController::class, 'update'])->name('admin.inserttypeproduct.update');
    Route::get('admin/inserttypeproduct/delete/{id}',[\App\Http\Controllers\Admin\TypeproductController::class, 'destroy'])->name('admin.inserttypeproduct.delete');

    Route::resource('adminimport', ImportController::class);
    Route::resource('adminuser', AdminUserController::class);
    Route::resource('admintypeuser', AdminTypeUserController::class);
    Route::resource('adminorder', AdminOrderController::class);
    Route::resource('adminstock', AdminStockController::class);
    Route::get('admin/insertimport', [\App\Http\Controllers\ImportController::class, 'addimport'])->name('admin.insertimport');
});
