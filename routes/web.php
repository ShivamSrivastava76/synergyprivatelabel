<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Staff\StaffCategoryController;

use App\Http\Controllers\Admin\AdminSubategoryController;
use App\Http\Controllers\Staff\StaffSubategoryController;

use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Staff\StaffProductController;

use App\Http\Controllers\Admin\AdminEnquiryController;
use App\Http\Controllers\Staff\StaffEnquiryController;

use App\Http\Controllers\Admin\AdminRemarkController;
use App\Http\Controllers\Staff\StaffRemarkController;

use App\Http\Controllers\Admin\AdminEnquiryMailController;
use App\Http\Controllers\Staff\StaffEnquiryMailController;

use App\Http\Controllers\IndexController;

use App\Http\Controllers\Admin\AdminStaffController;
use App\Http\Controllers\Staff\StaffStaffController;

use App\Http\Controllers\Admin\AdminContactUsController;
use App\Http\Controllers\Staff\StaffContactUsController;

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
Route::post('/enquiry', [IndexController::class, 'enquiry']);

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
    Route::get('/category', [AdminCategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [AdminCategoryController::class, 'create'])->name('category.create');
    Route::post('/category', [AdminCategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{id}/edit', [AdminCategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{id}/update', [AdminCategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}', [AdminCategoryController::class, 'destroy'])->name('category.destroy');
    Route::patch('/category/toggle-status', [AdminCategoryController::class, 'toggleStatus'])->name('category.toggleStatus');
    


    // Admin Subategory Routes
    Route::get('/subcategory', [AdminSubategoryController::class, 'index'])->name('subcategory.index');
    Route::get('/subcategory/create', [AdminSubategoryController::class, 'create'])->name('subcategory.create');
    Route::post('/subcategory', [AdminSubategoryController::class, 'store'])->name('subcategory.store');
    Route::get('/subcategory/{id}/edit', [AdminSubategoryController::class, 'edit'])->name('subcategory.edit');
    Route::put('/subcategory/{id}/update', [AdminSubategoryController::class, 'update'])->name('subcategory.update');
    Route::delete('/subcategory/{id}', [AdminSubategoryController::class, 'destroy'])->name('subcategory.destroy');
    Route::patch('/subcategory/toggle-status', [AdminSubategoryController::class, 'toggleStatus'])->name('subcategory.toggleStatus');

    // Admin Product Routes
    Route::get('/products', [AdminProductController::class, 'index'])->name('product.index');
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('product.create');
    Route::post('/products', [AdminProductController::class, 'store'])->name('product.store');
    Route::get('/products/{id}/edit', [AdminProductController::class, 'edit'])->name('product.edit');
    Route::put('/products/{id}', [AdminProductController::class, 'update'])->name('product.update');
    Route::delete('/products/{id}', [AdminProductController::class, 'destroy'])->name('product.destroy');
    Route::patch('/products/toggle-status', [AdminProductController::class, 'toggleStatus'])->name('product.toggleStatus');
    Route::post('/products/sub_category', [AdminProductController::class, 'sub_category']);
    Route::post('/products/subcategory', [AdminProductController::class, 'subcategory']);

    // Enquiry routes
    Route::get('enquiries', [AdminEnquiryController::class, 'index'])->name('enquiries.index');
    Route::get('enquiries/{id}', [AdminEnquiryController::class, 'showEnquiryDetails'])->name('enquiries.details');

    // Route::get('enquiries/create', [AdminEnquiryController::class, 'create'])->name('enquiries.create');
    // Route::post('enquiries', [AdminEnquiryController::class, 'store'])->name('enquiries.store');
    // Route::get('enquiries/{id}/edit', [AdminEnquiryController::class, 'edit'])->name('enquiries.edit');
    // Route::put('enquiries/{id}', [AdminEnquiryController::class, 'update'])->name('enquiries.update');
    // Route::delete('enquiries/{id}', [AdminEnquiryController::class, 'destroy'])->name('enquiries.destroy');

    // Remark routes
    Route::post('/remarks/store', [AdminRemarkController::class, 'store'])->name('remarks.store');
    // Mail routes
    Route::post('/mail/store', [AdminEnquiryMailController::class, 'store'])->name('mail.store');

    // Admin staff Routes
    Route::get('/staffs', [AdminStaffController::class, 'index'])->name('staff.index');
    Route::get('/staffs/create', [AdminStaffControllertest::class, 'create'])->name('staff.create');
    Route::post('/staffs', [AdminStaffControllertest::class, 'store'])->name('staff.store');
    Route::get('/staffs/{id}/edit', [AdminStaffControllertest::class, 'edit'])->name('staff.edit');
    Route::put('/staffs/{id}', [AdminStaffControllertest::class, 'update'])->name('staff.update');
    Route::delete('/staffs/{id}', [AdminStaffControllertest::class, 'destroy'])->name('staff.destroy');

    // Admin 
    Route::get('/contact-enquiries', [AdminContactUsController::class, 'index'])->name('contact-enquiry.index');
    Route::get('/contact-enquiries/{id}/view', [AdminContactUsController::class, 'view'])->name('contact-enquiry.view');
    Route::delete('/contact-enquiries/{id}', [AdminContactUsController::class, 'destroy'])->name('contact-enquiry.destroy');

});
//  Admin routes end

//  Staff routes 
Route::prefix('staff')->name('staff.')->group(function () {
    Route::get('/', [StaffStaffController::class, 'dashboard'])->name('index');

     // Admin Category Routes
     Route::get('/category', [StaffCategoryController::class, 'index'])->name('category.index');
     Route::get('/category/create', [StaffCategoryController::class, 'create'])->name('category.create');
     Route::post('/category', [StaffCategoryController::class, 'store'])->name('category.store');
     Route::get('/category/{id}/edit', [StaffCategoryController::class, 'edit'])->name('category.edit');
     Route::put('/category/{id}/update', [StaffCategoryController::class, 'update'])->name('category.update');
     Route::delete('/category/{id}', [StaffCategoryController::class, 'destroy'])->name('category.destroy');
     Route::patch('/category/toggle-status', [StaffCategoryController::class, 'toggleStatus'])->name('category.toggleStatus');
     
 
 
     // Admin Subategory Routes
     Route::get('/subcategory', [StaffSubategoryController::class, 'index'])->name('subcategory.index');
     Route::get('/subcategory/create', [StaffSubategoryController::class, 'create'])->name('subcategory.create');
     Route::post('/subcategory', [StaffSubategoryController::class, 'store'])->name('subcategory.store');
     Route::get('/subcategory/{id}/edit', [StaffSubategoryController::class, 'edit'])->name('subcategory.edit');
     Route::put('/subcategory/{id}/update', [StaffSubategoryController::class, 'update'])->name('subcategory.update');
     Route::delete('/subcategory/{id}', [StaffSubategoryController::class, 'destroy'])->name('subcategory.destroy');
     Route::patch('/subcategory/toggle-status', [StaffSubategoryController::class, 'toggleStatus'])->name('subcategory.toggleStatus');
 
     // Admin Product Routes
     Route::get('/products', [StaffProductController::class, 'index'])->name('product.index');
     Route::get('/products/create', [StaffProductController::class, 'create'])->name('product.create');
     Route::post('/products', [StaffProductController::class, 'store'])->name('product.store');
     Route::get('/products/{id}/edit', [StaffProductController::class, 'edit'])->name('product.edit');
     Route::put('/products/{id}', [StaffProductController::class, 'update'])->name('product.update');
     Route::delete('/products/{id}', [StaffProductController::class, 'destroy'])->name('product.destroy');
     Route::patch('/products/toggle-status', [StaffProductController::class, 'toggleStatus'])->name('product.toggleStatus');
     Route::post('/products/sub_category', [StaffProductController::class, 'sub_category']);
     Route::post('/products/subcategory', [StaffProductController::class, 'subcategory']);
 
     // Enquiry routes
     Route::get('enquiries', [StaffEnquiryController::class, 'index'])->name('enquiries.index');
     Route::get('enquiries/{id}', [StaffEnquiryController::class, 'showEnquiryDetails'])->name('enquiries.details');
 
     // Route::get('enquiries/create', [StaffEnquiryController::class, 'create'])->name('enquiries.create');
     // Route::post('enquiries', [StaffEnquiryController::class, 'store'])->name('enquiries.store');
     // Route::get('enquiries/{id}/edit', [StaffEnquiryController::class, 'edit'])->name('enquiries.edit');
     // Route::put('enquiries/{id}', [StaffEnquiryController::class, 'update'])->name('enquiries.update');
     // Route::delete('enquiries/{id}', [StaffEnquiryController::class, 'destroy'])->name('enquiries.destroy');
 
     // Remark routes
     Route::post('/remarks/store', [StaffRemarkController::class, 'store'])->name('remarks.store');
     // Mail routes
     Route::post('/mail/store', [StaffEnquiryMailController::class, 'store'])->name('mail.store');
 
     // Admin staff Routes
     Route::get('/staffs', [StaffStaffController::class, 'index'])->name('staff.index');
     Route::get('/staffs/create', [StaffStaffController::class, 'create'])->name('staff.create');
     Route::post('/staffs', [StaffStaffController::class, 'store'])->name('staff.store');
     Route::get('/staffs/{id}/edit', [StaffStaffController::class, 'edit'])->name('staff.edit');
     Route::put('/staffs/{id}', [StaffStaffController::class, 'update'])->name('staff.update');
     Route::delete('/staffs/{id}', [StaffStaffController::class, 'destroy'])->name('staff.destroy');
 
     // Admin 
     Route::get('/contact-enquiries', [StaffContactUsController::class, 'index'])->name('contact-enquiry.index');
     Route::get('/contact-enquiries/{id}/view', [StaffContactUsController::class, 'view'])->name('contact-enquiry.view');
     Route::delete('/contact-enquiries/{id}', [StaffContactUsController::class, 'destroy'])->name('contact-enquiry.destroy');
    
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