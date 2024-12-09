<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;


// WebController Routes
Route::get('/', [WebController::class, 'index'])->name('index');
Route::get('/product', [WebController::class, 'product'])->name('product');
Route::get('/addtocart', [WebController::class, 'addtocart'])->name('addtocart');
Route::get('/contact', [WebController::class, 'contact'])->name('contact');
Route::get('/about', [WebController::class, 'about'])->name('about');
Route::get('/form', [WebController::class, 'form'])->name('form');
Route::get('/description', [WebController::class, 'description'])->name('description');
Route::get('/login', [WebController::class, 'login'])->name('login');
Route::get('/register', [WebController::class, 'register'])->name('register');

// Dashboard (auth middleware)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ProfileController Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ProductController Routes
Route::get('/create', [ProductController::class, 'create'])->name('web.create');
Route::get('/admin', [ProductController::class, 'admin'])->name('web.admin');
Route::post('/store', [ProductController::class, 'store'])->name('web.store');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('web.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('web.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('web.destroy');

// Static Views (Fallback for specific routes)
Route::view('/index', 'web.index')->name('index');
Route::view('/form', 'web.form')->name('form');
Route::view('/about', 'web.about')->name('about');
Route::view('/contact', 'web.contact')->name('contact');
Route::view('/addtocart', 'web.addtocart')->name('addtocart');
Route::view('/product', 'web.product')->name('product');
Route::get('/product', [ProductController::class, 'index'])->name('product');

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.description');

Route::post('/reviews', [ReviewController::class, 'store'])->middleware('auth')->name('reviews.store');
Route::get('/products/{product}/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

require __DIR__.'/auth.php';
