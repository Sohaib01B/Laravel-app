<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\CartController;



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
    return view('auth.login');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('categories', CategorieController::class);


Route::resource('produits', ProduitController::class);
Route::post('/produits/generateAI', [ProduitController::class, 'generateAI'])->name('produits.generateAI');
Route::post('/produits/generate-image', [ProduitController::class, 'generateImage'])->name('produits.generateImage');


Route::resource('orders', OrderController::class);
Route::resource('order_items', OrderItemController::class);

//les routes pour le panier
Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{produitId}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::delete('/cart/remove/{produitId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
});
