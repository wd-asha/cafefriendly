<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth', 'admin']], function(){
    Route::get('admin/index', ['App\Http\Controllers\Admin\AdminDashboardController', 'index'])->name('admin.index');
    Route::get('user/destroy/{id}', ['App\Http\Controllers\Admin\AdminDashboardController', 'destroyUser'])->name('destroy.user');
    Route::get('user/delete/{id}', ['App\Http\Controllers\Admin\AdminDashboardController', 'deleteUser'])->name('delete.user');
    Route::get('user/restore/{id}', ['App\Http\Controllers\Admin\AdminDashboardController', 'restoreUser'])->name('restore.user');
});

Route::group(['middleware' => ['auth', 'author']], function(){
    Route::get('author/index', ['App\Http\Controllers\Author\AuthorDashboardController', 'index'])->name('author.index');
});

Route::get('password/reset/form', ['App\Http\Controllers\Auth\PasswordResetController', 'showForm'])->name('password.reset.form');
Route::post('reset/password', ['App\Http\Controllers\Auth\PasswordResetController', 'store'])->name('reset.password');

Route::get('forgot-password', ['App\Http\Controllers\Auth\ForgotPasswordController', 'create'])->name('password.reque');
Route::post('forgot-password', ['App\Http\Controllers\Auth\ForgotPasswordController', 'store'])->name('password.email');
Route::get('/password/reset/{token}', ['App\Http\Controllers\Auth\ResetPasswordController', 'create'])->name('password.reset');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('shop');
Route::post('user/personal/update', [App\Http\Controllers\UserController::class, 'personal'])->name('personal.update');
Route::post('user/shipping/update', [App\Http\Controllers\UserController::class, 'shipping'])->name('shipping.update');
Route::get('subscribe', ['App\Http\Controllers\Admin\SubscriberController', 'subscribe'])->name('subscribe');
Route::get('unsubscribe/{subscriber}', ['App\Http\Controllers\Admin\SubscriberController', 'unsubscribe'])->name('unsubscribe');

//Admin Category
Route::get('admin/categories', ['App\Http\Controllers\Admin\CategoryController', 'index'])->name('admin.categories');
Route::post('admin/category/store', ['App\Http\Controllers\Admin\CategoryController', 'store'])->name('admin.category.store');
Route::get('admin/category/delete/{id}', ['App\Http\Controllers\Admin\CategoryController', 'delete'])->name('admin.category.delete');

//Admin Product
Route::get('admin/products', ['App\Http\Controllers\Admin\ProductController', 'index'])->name('admin.products');
Route::get('admin/productsA', ['App\Http\Controllers\Admin\ProductController', 'indexA'])->name('admin.productsA');
Route::get('admin/productsS', ['App\Http\Controllers\Admin\ProductController', 'indexS'])->name('admin.productsS');
Route::get('admin/product/show/{id}', ['App\Http\Controllers\Admin\ProductController', 'show'])->name('admin.product.show');
Route::get('admin/product/create', ['App\Http\Controllers\Admin\ProductController', 'create'])->name('admin.product.create');
Route::post('admin/product/store', ['App\Http\Controllers\Admin\ProductController', 'store'])->name('admin.product.store');
Route::get('admin/product/edit/{id}', ['App\Http\Controllers\Admin\ProductController', 'edit'])->name('admin.product.edit');
Route::post('admin/product/update/{id}', ['App\Http\Controllers\Admin\ProductController', 'update'])->name('admin.product.update');
Route::post('admin/product/updatePhoto/{id}', ['App\Http\Controllers\Admin\ProductController', 'updatePhoto'])->name('admin.product.updatePhoto');
Route::get('admin/product/delete/{id}', ['App\Http\Controllers\Admin\ProductController', 'delete'])->name('admin.product.delete');
Route::get('productproduct/active/{id}', ['App\Http\Controllers\Admin\ProductController', 'active'])->name('product.active');
Route::get('product/inactive/{id}', ['App\Http\Controllers\Admin\ProductController', 'inactive'])->name('product.inactive');
Route::get('product/destroy/{id}', ['App\Http\Controllers\Admin\ProductController', 'destroy'])->name('destroy.product');
Route::get('product/restore/{id}', ['App\Http\Controllers\Admin\ProductController', 'restore'])->name('restore.product');
Route::post('product/product/amount/{id}', ['App\Http\Controllers\Admin\ProductController', 'amount'])->name('amount.product');

//Cart
Route::post('product/addCart/{id}', ['App\Http\Controllers\CartController', 'addCart'])->name('product.addCart');
Route::get('cart/delete/{rowId}', ['App\Http\Controllers\CartController', 'delete'])->name('cart.delete');
Route::get('cart', ['App\Http\Controllers\CartController', 'index'])->name('cart');
Route::post('cart/update', ['App\Http\Controllers\CartController', 'update'])->name('cart.update');
Route::post('check', ['App\Http\Controllers\CartController', 'check'])->name('check');

//Check and Order
Route::get('checkout', ['App\Http\Controllers\OrderController', 'checkout'])->name('checkout');

//Admin Orders
Route::get('admin/neworders', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('admin.neworders');
Route::get('admin/order/delete/{id}', [App\Http\Controllers\Admin\OrderController::class, 'orderDelete'])->name('admin.order.delete');
Route::get('admin/order/show/{id}', [App\Http\Controllers\Admin\OrderController::class, 'show'])->name('admin.order.show');
Route::get('admin/order/pending/{id}', [App\Http\Controllers\Admin\OrderController::class, 'pending'])->name('admin.order.pending');
Route::get('admin/orders/process', [App\Http\Controllers\Admin\OrderController::class, 'ordersProcess'])->name('admin.orders.process');
Route::get('admin/order/process/{id}', [App\Http\Controllers\Admin\OrderController::class, 'process'])->name('admin.order.process');
Route::get('admin/orders/delivered', [App\Http\Controllers\Admin\OrderController::class, 'ordersDelivered'])->name('admin.orders.delivered');
Route::get('admin/order/delivered/{id}', [App\Http\Controllers\Admin\OrderController::class, 'delivered'])->name('admin.order.delivered');
Route::get('admin/order/canceled/{id}', [App\Http\Controllers\Admin\OrderController::class, 'canceled'])->name('admin.order.canceled');
Route::get('admin/orders/canceled', [App\Http\Controllers\Admin\OrderController::class, 'ordersCanceled'])->name('admin.orders.canceled');

//Wishlist
Route::get('wishlist', ['App\Http\Controllers\WishlistController', 'index'])->name('wishlist');
Route::post('wishlist/add', ['App\Http\Controllers\WishlistController', 'add'])->name('wishlist.add');
Route::get('wishlist/destroy/{id}', ['App\Http\Controllers\WishlistController', 'destroy'])->name('wishlist.destroy');
Route::get('favorite/{product_id}', ['App\Http\Controllers\WishlistController', 'favorite'])->name('favorite');
Route::get('wishlist/delete/{id}', ['App\Http\Controllers\WishlistController', 'destroy'])->name('wishlist.destroy');

//Admin Subscribers
Route::get('admin/subscribers', ['App\Http\Controllers\Admin\SubscriberController', 'index'])->name('admin.subscribers');
Route::get('admin/subscriber/delete/{id}', ['App\Http\Controllers\Admin\SubscriberController', 'delete'])->name('delete.subscriber');
Route::get('admin/subscriber/destroy/{id}', ['App\Http\Controllers\Admin\SubscriberController', 'destroy'])->name('destroy.subscriber');
Route::get('admin/subscriber/restore/{id}', ['App\Http\Controllers\Admin\SubscriberController', 'restore'])->name('restore.subscriber');
Route::get('admin/subscriber/formMail/{userEmail}/{userName}', ['App\Http\Controllers\Admin\SubscriberController', 'formMail'])->name('formMail.subscriber');
Route::post('admin/subscriber/sendMail', ['App\Http\Controllers\Admin\SubscriberController', 'sendMail'])->name('sendMail.subscriber');
Route::post('admin/alerts/sendMail', ['App\Http\Controllers\Admin\AlertsController', 'sendMail'])->name('sendMail.alerts');
