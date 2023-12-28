<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
Route::get('/shop/{slug?}', [\App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/tag/{slug?}', [\App\Http\Controllers\ShopController::class, 'tag'])->name('shop.tag');
Route::get('/product/{product:slug}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.show');

Route::get('/cart',[\App\Http\Controllers\CartController::class,'index' ])->name('cart');


Route::get('/order',[\App\Http\Controllers\OrderController::class,'process']) -> name('checkout.process');





Route::group(['middleware' => ['auth' , 'isAdmin'],'prefix' => 'admin', 'as' =>'admin.'], function() {

    Route::get('/',[\App\Http\Controllers\Admin\DashboardController::class,'index']) -> name('dashboard');

    //categories
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::post('categories/image',[\App\Http\Controllers\Admin\CategoryController::class,'storeImage'])->name('categories.storeImage');
    
    //tags
    Route::resource('tags',\App\Http\Controllers\Admin\TagController::class);

    //products
    Route::resource('products',\App\Http\Controllers\Admin\ProductController::class);
    //Route::post('products/images',[\App\Http\Controllers\Admin\ProductController::class,'storeImage'])->name('products.storeImage');
    Route::post('/admin/products/images',[\App\Http\Controllers\Admin\ProductController::class,'storeImage'])->name('products.storeImage');
    

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search', [\App\Http\Controllers\HomeController::class, 'search'])->name('search');

