<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\WithdrawalController;
use App\Models\Order;
use Illuminate\Http\Request;
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

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/p/about', [HomeController::class, 'about'])->name('about');
Route::get('/p/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/p/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/p/terms-and-conditions', [HomeController::class, 'terms_and_conditions'])->name('terms_and_conditions');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/signup', [UserController::class, 'signup'])->name('signup');
Route::get('/reset', [UserController::class, 'reset'])->name('reset');
Route::post('/login', [UserController::class, 'post_login'])->name('post.login');
Route::post('/signup', [UserController::class, 'post_signup'])->name('post.signup');
Route::post('/reset', [UserController::class, 'post_reset'])->name('post.reset');


Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/empty/cart', [CartController::class, 'empty'])->name('empty.cart');
Route::get('/remove/cart/{id}', [CartController::class, 'remove'])->name('remove.cart');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout')->middleware("auth");
Route::get('/order-confirmation/{order_id}', [CartController::class, 'order_confirmation'])->name('order_confirmation');
Route::get('/order-failed/{order_id}', [CartController::class, 'order_failed'])->name('order_failed');
Route::get('/invoice/{order_id}', [CartController::class, 'invoice'])->name('invoice');
Route::post('/pay', [CartController::class, 'pay'])->name('pay')->middleware("auth");
Route::post('/get-tracking', function (Request $request){
    $data = Order::where('order_id', $request->order_id)->firstOrFail();
    return redirect()->route('user.index')->withData($data);
})->name('get.tracking')->middleware("auth");


Route::get('/user/index', [UserController::class, 'index'])->name('user.index')->middleware(['auth', 'user_account']);
Route::get('/user/favourites', [UserController::class, 'favourites'])->name('user.favourites')->middleware(['auth', 'user_account']);
Route::get('/user/settings', [UserController::class, 'settings'])->name('user.settings')->middleware(['auth', 'user_account']);
Route::get('/user/orders', [UserController::class, 'orders'])->name('user.orders')->middleware(['auth', 'user_account']);
Route::get('/user/order/{id}', [UserController::class, 'order'])->name('user.order')->middleware(['auth', 'user_account']);

Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware(['auth']);
Route::post('/settings', [UserController::class, 'post_edit_profile'])->name('post.edit.profile')->middleware(['auth']);

Route::get('/product/view/{slug}', [ProductController::class, 'single'])->name('product.view');
Route::get('/product/all', [ProductController::class, 'index'])->name('product.all');
Route::get('/product/recent', [ProductController::class, 'recent'])->name('product.recent');
Route::get('/product/popular', [ProductController::class, 'popular'])->name('product.popular');
Route::get('/product/featured', [ProductController::class, 'featured'])->name('product.featured');
Route::get('/category/{slug}', [ProductController::class, 'category'])->name('product.category');
Route::get('/category/{slug}/{sub}', [ProductController::class, 'subcategory'])->name('product.subcategory');
Route::post('/product/add', [ProductController::class, 'new'])->name('post.new.product');
Route::post('/product/update', [ProductController::class, 'edit'])->name('post.edit.product');
Route::get('/get/subcategory/{category_id}', [CategoryController::class, 'subcategory'])->name('get.subcategory');


Route::post('/add/review', [ReviewController::class, 'add'])->name('post.add.review');
Route::get('/favourites/{product_id}', [FavouriteController::class, 'add'])->name('favourites')->middleware(("auth"));
Route::get('/add/cart/{product_id}', [CartController::class, 'add'])->name('add.cart');

Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/results', [HomeController::class, 'get_search'])->name('get.search');

Route::get('/vendors', [HomeController::class, 'vendors'])->name('vendors');
Route::get('/vendor/profile/{uid}', [HomeController::class, 'vendor'])->name('vendor');


Route::get('/vendor/index', [VendorController::class, 'index'])->name('vendor.index')->middleware(['auth', 'vendor_account']);
Route::get('/vendor/add-payment-method', [VendorController::class, 'add_payment_method'])->name('vendor.add_payment_method')->middleware(['auth', 'vendor_account']);
Route::post('/vendor/add-payment-method', [VendorController::class, 'post_add_payment_method'])->name('vendor.post.add_payment_method')->middleware(['auth', 'vendor_account']);
Route::get('/vendor/settings', [VendorController::class, 'settings'])->name('vendor.settings')->middleware(['auth', 'vendor_account']);
Route::get('/vendor/edit-item/{slug}', [VendorController::class, 'edit_item'])->name('vendor.edit_item')->middleware(['auth', 'vendor_account']);
Route::get('/vendor/delete-item/{slug}', [VendorController::class, 'delete_item'])->name('vendor.delete_item')->middleware(['auth', 'vendor_account']);
Route::get('/vendor/manage-item', [VendorController::class, 'manage_item'])->name('vendor.manage_item')->middleware(['auth', 'vendor_account']);
Route::get('/vendor/purchases', [VendorController::class, 'purchases'])->name('vendor.purchases')->middleware(['auth', 'vendor_account']);
Route::any('/vendor/statement', [VendorController::class, 'statement'])->name('vendor.statement')->middleware(['auth', 'vendor_account']);
Route::get('/vendor/upload-item', [VendorController::class, 'upload'])->name('vendor.upload_item')->middleware(['auth', 'vendor_account']);
Route::get('/vendor/withdrawal', [VendorController::class, 'withdrawal'])->name('vendor.withdrawal')->middleware(['auth', 'vendor_account']);
Route::post('/vendor/withdrawal', [WithdrawalController::class, 'new'])->name('vendor.new.withdrawal')->middleware(['auth', 'vendor_account']);
Route::get('/vendor/purchase/{order_id}', [VendorController::class, 'purchase'])->name('vendor.purchase')->middleware(['auth', 'vendor_account']);


Route::post('/send/mail', function(Request $request) {
    mail('worldofcryptocurrency2022@gmail.com', "New message from - ".$request->name, $request->email."\n\n".$request->body);
    return redirect()->back()->withSuccess("Thank you for reaching out we will get back to you shortly..");
})->name('send.mail');