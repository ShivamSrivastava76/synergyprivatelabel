<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\RemarkController;
use App\Http\Controllers\EnquiryMailController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ContactUsController;

Route::get('/', [IndexController::class, 'index']);
Route::get('/about_us', [IndexController::class, 'about_us']);
Route::get('/what_we_do', [IndexController::class, 'what_we_do']);
Route::get('/faq', [IndexController::class, 'faq']);
Route::get('/our_team', [IndexController::class, 'our_team']);
Route::get('/search', [IndexController::class, 'search']);
Route::get('/searchproductlist/{key?}', [IndexController::class, 'searchproductlist']);
Route::get('/contact', [IndexController::class, 'contact']);
Route::get('/products', [IndexController::class, 'products']);
Route::get('/sortproduct/{key}', [IndexController::class, 'sortproduct']);
Route::get('/custom_formulations', [IndexController::class, 'custom_formulations']);
Route::get('/label_design_how_does_it_work', [IndexController::class, 'label_design_how_does_it_work']);
Route::get('/privacy_policy', [IndexController::class, 'privacy_policy']);
Route::get('/term_and_conditions', [IndexController::class, 'term_and_conditions']);
Route::get('/product_details/{id}', [IndexController::class, 'product_details']);
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy']);
Route::get('/category/{id}', [IndexController::class, 'category']);
Route::get('/enquiry', [IndexController::class, 'enquiry']);

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
    


    // Admin Subategory Routes
    Route::get('/subcategory', [SubategoryController::class, 'index'])->name('subcategory.index');
    Route::get('/subcategory/create', [SubategoryController::class, 'create'])->name('subcategory.create');
    Route::post('/subcategory', [SubategoryController::class, 'store'])->name('subcategory.store');
    Route::get('/subcategory/{id}/edit', [SubategoryController::class, 'edit'])->name('subcategory.edit');
    Route::put('/subcategory/{id}/update', [SubategoryController::class, 'update'])->name('subcategory.update');
    Route::delete('/subcategory/{id}', [SubategoryController::class, 'destroy'])->name('subcategory.destroy');
    Route::patch('/subcategory/toggle-status', [SubategoryController::class, 'toggleStatus'])->name('subcategory.toggleStatus');

    // Admin Product Routes
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/products', [ProductController::class, 'store'])->name('product.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::patch('/products/toggle-status', [ProductController::class, 'toggleStatus'])->name('product.toggleStatus');
    Route::post('/products/sub_category', [ProductController::class, 'sub_category']);
    Route::post('/products/subcategory', [ProductController::class, 'subcategory']);

    // Enquiry routes
    Route::get('enquiries', [EnquiryController::class, 'index'])->name('enquiries.index');
    Route::get('enquiries/{id}', [EnquiryController::class, 'showEnquiryDetails'])->name('enquiries.details');

    // Route::get('enquiries/create', [EnquiryController::class, 'create'])->name('enquiries.create');
    // Route::post('enquiries', [EnquiryController::class, 'store'])->name('enquiries.store');
    // Route::get('enquiries/{id}/edit', [EnquiryController::class, 'edit'])->name('enquiries.edit');
    // Route::put('enquiries/{id}', [EnquiryController::class, 'update'])->name('enquiries.update');
    // Route::delete('enquiries/{id}', [EnquiryController::class, 'destroy'])->name('enquiries.destroy');

    // Remark routes
    Route::post('/remarks/store', [RemarkController::class, 'store'])->name('remarks.store');
    // Mail routes
    Route::post('/mail/store', [EnquiryMailController::class, 'store'])->name('mail.store');

    // Admin staff Routes
    Route::get('/staffs', [StaffController::class, 'index'])->name('staff.index');
    Route::get('/staffs/create', [StaffController::class, 'create'])->name('staff.create');
    Route::post('/staffs', [StaffController::class, 'store'])->name('staff.store');
    Route::get('/staffs/{id}/edit', [StaffController::class, 'edit'])->name('staff.edit');
    Route::put('/staffs/{id}', [StaffController::class, 'update'])->name('staff.update');
    Route::delete('/staffs/{id}', [StaffController::class, 'destroy'])->name('staff.destroy');

    // Admin 
    Route::get('/contact-enquiries', [ContactUsController::class, 'index'])->name('contact-enquiry.index');
    Route::get('/contact-enquiries/{id}/view', [ContactUsController::class, 'view'])->name('contact-enquiry.view');
    Route::delete('/contact-enquiries/{id}', [ContactUsController::class, 'destroy'])->name('contact-enquiry.destroy');

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