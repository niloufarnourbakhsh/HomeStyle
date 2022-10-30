<?php

use App\Http\Controllers\AdressController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\checkTheAdmin;
use Illuminate\Support\Facades\Auth;
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
    return view('main');
});

Auth::routes();

Route::middleware([checkTheAdmin::class])->prefix('category')->group(function (){
    Route::get('/',[CategoryController::class,'index']);
    Route::post('/',[CategoryController::class,'store']);
    Route::delete('/{category}',[CategoryController::class,'delete']);
    Route::put('/{category}',[CategoryController::class,'edit']);
});

Route::middleware([checkTheAdmin::class])->prefix('product')->group(function () {

    Route::get('/',[ProductController::class,'index'])->name('products.all');
    Route::get('/create',[ProductController::class,'create']);
    Route::post('/store',[ProductController::class,'store']);
    Route::delete('/{product}',[ProductController::class,'delete']);
    Route::get('/edit/{product}',[ProductController::class,'edit']);
    Route::put('/{product}',[ProductController::class,'update']);
    Route::delete('/image/{id}',[ImageController::class,'delete']);
});
Route::middleware([checkTheAdmin::class])->group(function (){
    Route::get('/admin',function (){
        return view('admin.index');
    });
    //user route
    Route::get('/users',[UserController::class,'index'])->name('users');
});

//order routes
Route::middleware([checkTheAdmin::class])->prefix('orders')->group(function () {
    Route::get('/status/{status_id}',[OrderController::class,'status']);
    Route::put('/update/{order}',[OrderController::class,'update']);
    Route::get('/',[OrderController::class,'index']);
});

Route::get('/product/{product:slug}',[ProductController::class,'show']);
Route::get('/products/',[ShoppingController::class,'index'])->name('products');


Route::get('/search/',[ProductController::class,'search'])->name('search');

Route::prefix('/cart')->group(function (){
    Route::get('/', [CartController::class,'index'])->name('cart.index');
    Route::post('/store', [CartController::class,'store']);
    Route::put('/update/{product}', [CartController::class,'update']);
    Route::get('/destroy', [CartController::class,'destroy']);
    Route::delete('/remove/{id}',[CartController::class,'remove']);
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Profile Route
Route::get('/address',[AdressController::class,'index']);
Route::post('/address/{user}',[AdressController::class,'store']);
Route::get('/checkout/step-2',[CheckOutController::class,'showAddress'])->middleware('auth');
Route::get('/checkout/step-3',[CheckOutController::class,'checkAll'])->middleware('auth');
Route::get('/done',[CheckOutController::class,'addToOrderTable']);

Route::get('/order',[OrderController::class,'show'])->middleware('auth');
Route::get('/details/{order}',[OrderController::class,'details']);
