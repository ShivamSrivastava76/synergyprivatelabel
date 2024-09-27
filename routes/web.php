<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\IndexController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [IndexController::class, 'index']);
Route::get('/about_us', [IndexController::class, 'about_us']);
Route::get('/what_we_do', [IndexController::class, 'what_we_do']);
Route::get('/faq', [IndexController::class, 'faq']);
Route::get('/our_team', [IndexController::class, 'our_team']);
Route::get('/search', [IndexController::class, 'search']);
Route::get('/contact', [IndexController::class, 'contact']);
Route::get('/products', [IndexController::class, 'products']);
Route::get('/custom_formulations', [IndexController::class, 'custom_formulations']);
Route::get('/label_design_how_does_it_work', [IndexController::class, 'label_design_how_does_it_work']);
Route::get('/privacy_policy', [IndexController::class, 'privacy_policy']);
Route::get('/term_and_conditions', [IndexController::class, 'term_and_conditions']);
Route::get('/product_details', [IndexController::class, 'product_details']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//  Admin routes 
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('index');
    // Admin Category Routes
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{id}/update', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::patch('/category/toggle-status', [CategoryController::class, 'toggleStatus'])->name('category.toggleStatus');

    // Admin Product Routes
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/products', [ProductController::class, 'store'])->name('product.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::patch('/products/toggle-status', [ProductController::class, 'toggleStatus'])->name('product.toggleStatus'); // Optional for status toggle
});
//  Admin routes end

//  Staff routes 
Route::prefix('staff')->name('staff.')->group(function () {
    Route::get('/', function () {
        return view('staff.index');
    })->name('index');
    
});
//  Staff routes end

//  User routes 
Route::prefix('user')->name('user.')->group(function () {
    Route::get('/', function () {
        return view('user.index');
    })->name('index');
    
});
//  User routes end
require __DIR__.'/auth.php';

