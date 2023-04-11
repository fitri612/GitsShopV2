<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductControllerv2;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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
    if (Auth::check()) {
        return redirect()->route('category.index');
    } else {
        return view('auth.login');
    }
})->middleware('guest');


Auth::routes();


Route::middleware(['admin'])->group(function () {
    Route::get('/category', [CategoriesController::class, 'index'])->name('category.index');
    Route::post('/categories', [CategoriesController::class, 'store'])->name('categories.store');
    Route::delete('/categories/{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy');
    Route::get('/categories/{id}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [CategoriesController::class, 'update'])->name('categories.update');


    // V2 Routes product
    // Route::post('/order/{order}/confirm', [OrderController::class, 'confirm_payment'])->name('confirm_payment');
    Route::get('/productV2', [ProductControllerv2::class, 'index'])->name('index.productV2');
    Route::get('/productV2/{product}', [ProductControllerv2::class, 'show_product'])->name('show.productV2');
    Route::get('/productV2/create', [ProductControllerv2::class, 'create'])->name('create.productV2');
    Route::post('/productV2/create', [ProductControllerv2::class, 'store'])->name('store.productV2');
    Route::delete('/productV2/{product}', [ProductControllerv2::class, 'destroy'])->name('destroy.productV2');
    Route::get('/productV2/{product}/edit', [ProductControllerv2::class, 'edit'])->name('edit.productV2');
    Route::put('/productV2/{product}', [ProductControllerv2::class, 'update'])->name('update.productV2');

    // route yang akan dibuang
    Route::get('/product/create', [ProductController::class, 'create_product'])->name('create_product');
    Route::post('/product/create', [ProductController::class, 'store_product'])->name('store_product');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit_product'])->name('edit_product');
    Route::patch('/product/{product}/update', [ProductController::class, 'update_product'])->name('update_product');
    Route::delete('/product/{product}', [ProductController::class, 'delete_product'])->name('delete_product');
});



Route::middleware(['auth'])->group(function () {
    Route::controller(TransactionController::class)->prefix('transaction')->name('transaction.')->group(function () {
        Route::get('index', 'cashier')->name('cashier');
        Route::post('store', 'store')->name('store');
        Route::get('history', 'index_history')->name('history');
        Route::get('print/{transaction}', 'print_invoice')->name('print');
    });

    // route v2
    Route::get('/productV2/{product}', [ProductControllerv2::class, 'show_product'])->name('show.productV2');
    Route::get('/cart', [CartController::class, 'show_cart'])->name('show_cart');
    Route::post('/cart/{product}', [CartController::class, 'add_to_cart'])->name('add_to_cart');
    Route::put('/cart/{cart}', [CartController::class, 'update_cart'])->name('update_cart');
    Route::delete('/cart/{cart}', [CartController::class, 'delete_cart'])->name('delete_cart');
    Route::get('/profile', [ProfileController::class, 'show_profile'])->name('show_profile');
    Route::post('/profile', [ProfileController::class, 'edit_profile'])->name('edit_profile');
    Route::get('/setting', [ProfileController::class, 'show_profile_admin'])->name('show_profile_admin');

    
    // show profile admin
    //route akan dibuang
    // Route::get('/product/{product}', [ProductController::class, 'show_product'])->name('show_product');
});
