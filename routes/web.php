<?php

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


/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/


/*-----------------AUTH ROUTES GROUPES--------------------------------------------------------------------------------------------------------------*/
Route::group(['middleware'=>['auth']], function(){
    
    // Wishlist Controllers---------
    Route::get('/wishlist', 'WishlistController@index')->name('wishlist.index');
    Route::post('/wishlist', 'WishlistController@store')->name('wishlist.store');
    Route::get('/wishlist/count', 'WishlistController@count')->name('wishlist.count');
    Route::get('/wishlist/get', 'WishlistController@getData')->name('wishlist.get');
    Route::delete('/wishlist/{wishlist}', 'WishlistController@destroy')->name('wishlist.destroy');
    // --------------

    Route::get('/cart', 'CartController@basket')->name('cart.index');
    Route::post('/cart/create/', 'CartController@create')->name('cart.create');
    Route::post('/cart/remove/{id}', 'CartController@remove')->name('cart.remove');
    Route::post('/cart/update/', 'CartController@update')->name('cart.increase');
    Route::get('/cart/count', 'CartController@count')->name('cart.count');
    Route::post('/notification/packer/', 'NotificationController@packer')->name('notification.packer');
    Route::post('/notification/delivery/', 'NotificationController@delivery')->name('notification.delivery');
    Route::post('/rate/add', 'IndexController@add_rate')->name('rate.add');
});

/*------------------------------------------------------------------------------------------------------------------------------------------------*/ 


/*  -----------------------------------------------------------------------------------------------
------------------------ADMIN GROUP ROUTES------------------------------------------------------------------------------------------  */

Route::group(['middleware'=>['auth', 'admin'], 'namespace'=>'admin', 'prefix'=>'admin'], function(){
    Route::resource('users', 'UserController')->names('admin.user');
    Route::resource('category', 'CategoryController')->names('admin.category');
});
/*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/ 

/*-------------SELLER GROUP ROUTES--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/ 
Route::group(['middleware'=>['auth', 'seller'], 'namespace'=>'Seller', 'prefix'=>'seller'], function(){
    Route::get('all', 'SellerController@index')->name('seller.index');
    Route::get('products', 'SellerController@products')->name('seller.products');
    Route::resource('product', 'ProductController')->names('seller.product');
});
/*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/ 


/*-------------PACKER GROUP ROUTES--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

Route::group(['middleware'=>['auth', 'packer'], 'namespace'=>'Packer', 'prefix'=>'packer'], function(){
    Route::get('/', 'PackerController@index')->name('packer.index');
    Route::post('order/accept', 'PackerController@accept')->name('packer.accept');
    Route::get('order/{id}', 'PackerController@order')->name('packer.order');
});
/*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/ 

/*-------------DELIVERY GROUP ROUTES--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
Route::group(['middleware'=>['auth', 'delivery'], 'namespace'=>'Delivery', 'prefix'=>'delivery'], function(){
    Route::get('order', 'DeliveryController@index')->name('delivery.index');
    Route::post('order/accept', 'DeliveryController@accept')->name('delivery.accept');
    Route::get('order/{id}', 'DeliveryController@order')->name('delivery.order');
    Route::post('order/end', 'DeliveryController@end')->name('delivery.end');
});

/*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/ 

Route::get('/user', 'User\UserController@index')->name('User')->middleware(['auth', 'user']);

Route::get('/test', 'TestController@index')->name('test');