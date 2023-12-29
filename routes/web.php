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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Dashboard
Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'dashboard'])->name('dashboard');
// web.php

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard']);
});

// In web.php
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update/{id}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');



// In routes/web.php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;

Route::view('/contact', 'contact')->name('contact'); 
Route::view('/about', 'about')->name('about'); 



Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');



Route::post('/add-to-cart/{product}', [App\Http\Controllers\CartController::class, 'addToCart'])->name('add-to-cart');
Route::post('/cart/add/{productId}', 'CartController@addToCart')->name('cart.add');



Route::get('/my-cart', [App\Http\Controllers\CartController::class, 'showCart'])->name('my-cart');



