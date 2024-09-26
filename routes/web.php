<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerProfileController;
use App\Http\Controllers\PolicieController;
use App\Http\Controllers\userController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\ProductWishController;
use App\Http\Controllers\ProductCartController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\HomeController;





// product
Route::get('/product-by-category/{id}', [ProductController::class, 'productByCategory'])->name('product-by-category');

Route::get('/product-by-brand/{id}', [ProductController::class, 'productByBrand'])->name('product-by-brand');

Route::get('products/{id}', [ProductController::class, 'productDetails'])->name('product-details');

Route::get('/product-by-remark/{remark}', [ProductController::class, 'productByRemark'])->name('product-by-remark');

Route::get('/product-by-review/{product_id}', [ProductController::class, 'productByReview'])->name('product-by-review');

Route::get('/category-by-product', [CategoryController::class, 'categoryByProducts'])->name('category-by-product');

Route::get('/product-details', [ProductController::class, 'productDetailsPage'])->name('product-details-page');



//product sliders
Route::get('/product-sliders', [ProductController::class, 'productSliders'])->name('product-sliders');


// brand
Route::get('/brand-list', [BrandController::class, 'brandList'])->name('brand-list');


// category
Route::get('/category-list', [CategoryController::class, 'categoryList'])->name('category-list');


// user profile

// Route::get('/customer-profile/{id}', [CustomerProfileController::class, 'customerProfile'])->name('customer-profile');



// policie

Route::get('/policie/{type}', [PolicieController::class, 'policieHandler'])->name('policie-handler');

Route::get('/policie', [PolicieController::class, 'policiesPages'])->name('policies-pages');


// Login route

Route::get('/login/{email}', [userController::class, 'login'])->name('login');
Route::get('/varify-otp/{email}/{otp}', [userController::class, 'verifyOtp'])->name('verifyOtp');

Route::get('/logout', [userController::class, 'logout'])->name('logout');

Route::get('/login', [userController::class, 'loginPage'])->name('login-page');

Route::get('/varify-otp', [userController::class, 'varifyOtpPage'])->name('varify-otp-page');


//profile
Route::post('/create-profile', [CustomerProfileController::class, 'createProfile'])->name('create-profile')->middleware([AuthMiddleware::class]);

Route::get('/customer-profile', [CustomerProfileController::class, 'readCustomerProfile'])->name('customer-profile')->middleware([AuthMiddleware::class]);

Route::get('/profile', [CustomerProfileController::class, 'customerProfilePage'])->name('customer-profile-page')->middleware([AuthMiddleware::class]);


// product review

Route::post('/create-review', [ProductReviewController::class, 'createReview'])->name('create-review')->middleware([AuthMiddleware::class]);



//product Wish
Route::get('/product-wish', [ProductWishController::class, 'wishList'])->name('wishList')->middleware([AuthMiddleware::class]);

Route::get('/add-to-wish/{product_id}', [ProductWishController::class, 'addToWishList'])->name('addToWishList')->middleware([AuthMiddleware::class]);

Route::get('/remove-from-wish/{product_id}', [ProductWishController::class, 'removeFromWishList'])->name('removeFromWishList')->middleware([AuthMiddleware::class]);

Route::get('/wish-list', [ProductWishController::class, 'wishListPage'])->name('wishListPage')->middleware([AuthMiddleware::class]);

Route::get('/wish-list-count', [ProductWishController::class, 'wishListCount'])->name('wishListCount')->middleware([AuthMiddleware::class]);

//product cart
Route::post('/add-to-cart', [ProductCartController::class, 'addToCart'])->name('addToCart')->middleware([AuthMiddleware::class]);

Route::get('/delete-cart/{product_id}', [ProductCartController::class, 'deleteCart'])->name('deleteCart')->middleware([AuthMiddleware::class]);

Route::get('/cart-list-api', [ProductCartController::class, 'cartList'])->name('cartList')->middleware([AuthMiddleware::class]);

Route::get('/cart-list', [ProductCartController::class, 'cartListPage'])->name('cartListPage')->middleware([AuthMiddleware::class]);




//invoice
Route::get('/create-invoice', [InvoiceController::class, 'createInvoice'])->name('create-invoice')->middleware([AuthMiddleware::class]);

Route::get('/invoices', [InvoiceController::class, 'invoiceList'])->name('invoiceList')->middleware([AuthMiddleware::class]);

Route::get('/invoiceProducts/{invoice_id}', [InvoiceController::class, 'invoiceProductList'])->middleware([AuthMiddleware::class]);


//SSLCommerz

Route::post('/paymentSuccess', [InvoiceController::class, 'paymentSuccess']);

Route::post('/paymentFail', [InvoiceController::class, 'paymentFail']);

Route::post('/paymentCancel', [InvoiceController::class, 'paymentCancel']);






//pages routes

Route::get('/',[HomeController::class, 'index'])->name('home');
