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




Route::post('/add-to-cart/{product}', [App\Http\Controllers\CartController::class, 'addToCart'])->name('add-to-cart');
Route::post('/cart/add/{productId}', 'CartController@addToCart')->name('cart.add');



Route::get('/my-cart', [App\Http\Controllers\CartController::class, 'showCart'])->name('my-cart');

Route::get('/faq', 'App\Http\Controllers\FAQController@index')->name('faq.index');

Route::get('/faq/create', 'FAQController@create')->name('faq.create');

Route::post('/faq', 'FAQController@store')->name('faq.store');

Route::get('/faq/{id}', 'FAQController@show')->name('faq.show');

Route::get('/faq/{id}/edit', 'FAQController@edit')->name('faq.edit');

Route::put('/faq/{id}', 'FAQController@update')->name('faq.update');

Route::delete('/faq/{id}', 'FAQController@destroy')->name('faq.destroy');





// Returns the home page with all products
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('products.index');

// Returns the form for adding a product
Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name('products.create');

// Adds a product to the database
Route::post('/products', 'App\Http\Controllers\ProductController@store')->name('products.store');

// Returns a page that shows a full product
Route::get('/products/{product}', 'App\Http\Controllers\ProductController@show')->name('products.show');

// Returns the form for editing a product
Route::get('/products/{product}/edit',  App\Http\Controllers\ProductController::class .'@edit')->name('products.edit');

// Updates a product
Route::put('/products/{product}', 'App\Http\Controllers\ProductController@update')->name('products.update');

// Deletes a product
Route::delete('/products/{product}', 'App\Http\Controllers\ProductController@destroy')->name('products.destroy');


// returns the home page with all posts
Route::get('/', App\Http\Controllers\PostController::class .'@index')->name('posts.index');
// returns the form for adding a post
Route::get('/posts/create', App\Http\Controllers\PostController::class . '@create')->name('posts.create');
// adds a post to the database
Route::post('/posts', App\Http\Controllers\PostController::class .'@store')->name('posts.store');
// returns a page that shows a full post
Route::get('/posts/{post}', App\Http\Controllers\PostController::class .'@show')->name('posts.show');
// returns the form for editing a post
Route::get('/posts/{post}/edit', App\Http\Controllers\PostController::class .'@edit')->name('posts.edit');
// updates a post
Route::put('/posts/{post}', App\Http\Controllers\PostController::class .'@update')->name('posts.update');
// deletes a post
Route::delete('/posts/{post}', App\Http\Controllers\PostController::class .'@destroy')->name('posts.destroy');

// In routes/web.php
Route::post('/products/{product}/like', [App\Http\Controllers\LikeController::class, 'store'])->name('products.like');
