<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UploadImageController;
use App\Models\User;
use App\Models\Gallery;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductPurchaseController;
use Illuminate\Http\Response;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ShippingInfoController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Password;


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


Route::get('/', [ShowController::class, 'ShowHome']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('updateProfile', ProfileController::class);
    Route::resource('addresses', AddressController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('order',OrderController::class);
    Route::resource('orderItem',OrderItemController::class);
    Route::resource('permission',PermissionController::class);
    Route::resource('shippinginfo',ShippingInfoController::class);
    Route::resource('comments',CommentController::class);
    Route::resource('upload-image', UploadImageController::class);
    Route::resource('brands', BrandController::class);

});


//Profile Routes
Route::get('profile' , [ProfileController::class , 'showProfile'])->name('profile');
Route::get('change' , [ProfileController::class , 'showPageChange'])->name('change');
Route::post('changePassword' , [ProfileController::class , 'changePassword'])->name('change-password');
Route::get('dashboard',[ProfileController::class,'viewDashboard'])->name('dashboard');

//Shopping Routs
Route::get('shop-grid' , [ProductController::class , 'shop_grid'])->name('shop-grid');
Route::get('/product-details/{id}' , [ProductController::class , 'showProductDetail'])->name('product-details');
Route::get('getCategory/{id}',[CategoryController::class,'showCategoryPageOne'])->name('get-Category');
Route::get('getCategoryParent/{parent}',[CategoryController::class,'showCategoryPageTwo'])->name('get-Category-parent');
Route::get('newProducts',[CategoryController::class,'showTagNew'])->name('get-tag-new');
Route::get('MostPopularProducts',[CategoryController::class,'showTagMostPopular'])->name('get-tag-popular');
Route::get('DiscountProducts',[CategoryController::class,'showTagDiscount'])->name('get-tag-discount');



//routes for cart
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::post('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::delete('remove-from-cart', [CartController::class, 'removeCart'])->name('remove.from.cart');
Route::get('cart-page',[CartController::class, 'index'])->name('cart-page');



//Payment Routes
Route::post('payment/{arr}/{quantity}/{addressId}/{totalAmount}/purchase',[paymentController::class,'purchase'])->name('purchase');
Route::get('payment/{product_ids}/{quantity}/{addressId}/purchase/result',[paymentController::class,'result'])->name('purchase.result');
Route::get('checkout/{serialize}/{quantity}/{totalAmount}',[paymentController::class,'showPay']);
Route::get('result-page/{transactionId}',[paymentController::class,'index'])->name('result');


//Order Lists Routes
Route::get('invoice/{id}',[OrderController::class,'show']) ;
Route::get('order-list',[OrderController::class,'index'])->name('orderList');

//search controller
Route::get('search',[SearchController::class,'searching'])->name('search');

Route::get('becoming-seller',[BrandController::class,'sellerRegister'])->name('becoming-seller');
Route::post('storeSeller',[BrandController::class,'CreateSeller'])->name('store-seller');
Route::get('showUpdateSellers',[BrandController::class, 'ShowUpdateUserSeller'])->name('show-update-sellers');
Route::post('updateSellers',[BrandController::class, 'updateUserSeller'])->name('update-sellers');
Route::get('check',[BrandController::class,'ShowcheckingPage'])->name('check-situaition');


Route::get('show-orders',[OrderController::class,'showOrders'])->name('show-orders');
Route::get('show-order-details/{id}',[OrderController::class,'showOrderDetails'])->name('show-order-details');
Route::get('show-comments',[CommentController::class,'adminpanel_comments'])->name('show-comments');
Route::get('show-comment-details/{comment}',[CommentController::class,'adminpanel_comment_details'])->name('show-comment-details');
Route::delete('delete-comment/{comment}',[CommentController::class,'delete_comment'])->name('delete_comment');
