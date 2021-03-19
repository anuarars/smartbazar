<?php

use App\Http\Resources\CategoriesCollection;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*---------------------------------------------------------------------------------------------------------------------------PUBLIC ROUTES GROUP--------------------------------------------------------------------------------------------*/

Route::get('/', 'IndexController@index')->name('index');
Route::get('/products/{id}', 'IndexController@product')->name('product');

Route::get('/info/delivery', 'InfoController@delivery')->name('info.delivery');
Route::get('/info/faq', 'InfoController@faq')->name('info.faq');
Route::post('/search/product', 'SearchController@product')->name('search.product');


/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/


/*-----------------AUTH ROUTES GROUPES--------------------------------------------------------------------------------------------------------------*/
Route::group(['middleware'=>['auth']], function(){

    // Wishlist Controllers---------
    Route::get('/wishlist', 'WishlistController@index')->name('wishlist.index');
    Route::post('/wishlist/{product}', 'WishlistController@store')->name('wishlist.store');
    Route::get('/wishlist/count', 'WishlistController@count')->name('wishlist.count');
    Route::get('/wishlist/get', 'WishlistController@getData')->name('wishlist.get');
    Route::delete('/wishlist/{wishlist}', 'WishlistController@destroy')->name('wishlist.destroy');
    Route::delete('/wishlist/unlike/{product}', 'WishlistController@unlike')->name('wishlist.unlike');
    // --------------

    Route::get('/cart', 'CartController@index')->name('cart.index');
    Route::post('/cart/create', 'CartController@create')->name('cart.create');
    Route::post('/cart/update/', 'CartController@update')->name('cart.increase');
    Route::get('/cart/count', 'CartController@count')->name('cart.count');
    Route::get('/cart/get', 'CartController@getData')->name('cart.get');
    Route::post('/cart/destroy', 'CartController@destroy')->name('cart.destroy');
    Route::post('/cart/unlike/{id}', 'CartController@unlike')->name('cart.unlike');

    // Profile---------------------------------------------------
    Route::get('/profile', 'ProfileController@index')->name('profile.index');
    Route::get('/profile/address', 'ProfileController@address')->name('profile.address');
    Route::post('/profile/address', 'ProfileController@addressCreate')->name('profile.address.create');
    Route::post('/profile/address/update/{address}', 'ProfileController@addressUpdate')->name('profile.address.update');
    Route::delete('/profile/address/remove/{address}', 'ProfileController@addressRemove')->name('profile.address.destroy');
    Route::get('/profile/password', 'ProfileController@password')->name('profile.password');
    Route::post('/profile/password', 'ProfileController@passwordUpdate')->name('profile.password.update');
    Route::get('/profile/history', 'ProfileController@history')->name('profile.history');
    // --------------------------------------------------------------------

    Route::post('/notification/packer/', 'NotificationController@packer')->name('notification.packer');
    Route::post('/notification/delivery/{order}', 'NotificationController@delivery')->name('notification.delivery');

    Route::post('/rate/add', 'IndexController@add_rate')->name('rate.add');
    Route::get('/review/{companyId}', 'ReviewController@show')->name('review.show');
    Route::post('/review/store', 'ReviewController@store')->name('review.store');

    Route::get('checkout/{orderId}', 'CheckoutController@show')->name('checkout.show');
    Route::get('checkout/{orderId}/success', 'CheckoutController@success')->name('checkout.success');
});

/*------------------------------------------------------------------------------------------------------------------------------------------------*/


/*  -----------------------------------------------------------------------------------------------
------------------------ADMIN GROUP ROUTES------------------------------------------------------------------------------------------  */

Route::group(['middleware'=>['auth', 'admin'], 'namespace'=>'admin', 'prefix'=>'admin'], function(){
    Route::resource('users', 'UserController')->names('admin.user');
    Route::resource('category', 'CategoryController')->names('admin.category');
    Route::resource('page', 'PageController')->names('admin.page')->parameters([
        'page' => 'page:slug',
    ]);
});
Route::get('test/category/{id}', 'Admin\CategoryController@show');
/*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*-------------SELLER GROUP ROUTES--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
Route::group(['middleware'=>['auth', 'seller'], 'namespace'=>'Seller', 'prefix'=>'company'], function(){
    Route::resource('product', 'ProductController')->names('seller.product');
    Route::get('profile', 'CompanyController@index')->name('seller.company.dashboard');
    Route::get('profile/edit/', 'CompanyController@edit')->name('seller.company.edit');
    Route::post('profile/update', 'CompanyController@update')->name('seller.company.profile.update');

    Route::get('user/profile', 'UserController@profile')->name('seller.user.profile');
    Route::get('user/profile/edit', 'UserController@edit')->name('seller.user.edit');
    Route::get('/sales/live', 'SellerController@live')->name('seller.live');
    // Route::get('products', 'SellerController@products')->name('seller.products');

    /** Беру категории для селекта */
    Route::get('/category/{id}', 'CategoryController@showChildren')->name('category.show');
});
/*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/


/*-------------PACKER GROUP ROUTES--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

Route::group(['middleware'=>['auth', 'packer'], 'namespace'=>'Packer', 'prefix'=>'packer'], function(){
    Route::get('/', 'PackerController@index')->name('packer.index');
    Route::post('order/accept', 'PackerController@accept')->name('packer.accept');
    Route::get('order/accept/{id}', 'PackerController@order')->name('packer.order');
    Route::post('/order/available', 'PackerController@available')->name('packer.orders');
});
/*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*-------------DELIVERY GROUP ROUTES--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
Route::group(['middleware'=>['auth', 'delivery'], 'namespace'=>'Delivery', 'prefix'=>'delivery'], function(){
    Route::get('order', 'DeliveryController@index')->name('delivery.index');
    Route::post('order/accept', 'DeliveryController@accept')->name('delivery.accept');
    Route::get('order/accept/{id}', 'DeliveryController@order')->name('delivery.order');
    Route::post('order/end/{order}', 'DeliveryController@end')->name('delivery.end');
});

/*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

Route::get('/user', 'User\UserController@index')->name('User')->middleware(['auth', 'user']);

// Route::get('/catalog', 'CatalogController@index')->name('catalog.index');
Route::get('/catalog/{category?}', 'Defaults\CatalogController@index')->name('catalog.index');
Route::get('/test2', 'TestController@index2')->name('index2');
