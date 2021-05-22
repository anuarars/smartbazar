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
Route::get('/verify/phone', 'Auth\PhoneVerificationController@index')->name('verify.phone');
Route::post('/verify/phone', 'Auth\PhoneVerificationController@code')->name('verify.code');
Route::post('/verify/resend', 'Auth\PhoneVerificationController@resend')->name('verify.resend');
Route::post('/verify/reset', 'Auth\PhoneVerificationController@reset')->name('verify.reset');

Route::get('/home', 'HomeController@index')->name('home');
/*---------------------------------------------------------------------------------------------------------------------------PUBLIC ROUTES GROUP--------------------------------------------------------------------------------------------*/

Route::get('/', 'IndexController@index')->name('index');
//Route::get('/{page:slug}', 'PageController@show')->name('page.show');
Route::get('/items/{id}', 'IndexController@item')->name('item');
Route::get('/products/{id}', 'IndexController@product')->name('product');
Route::get('/change/city/{city}', 'IndexController@change_city')->name('change.city');

Route::get('/info/delivery', 'InfoController@delivery')->name('info.delivery');
Route::get('/info/faq', 'InfoController@faq')->name('info.faq');
Route::post('/search/product', 'SearchController@product')->name('search.product');
Route::get('/push/pusher/beams-auth', 'PushController@tokenProvider');
Route::post('/push/pusher/id', 'PushController@getUserId');
// Route::get('page/', 'Admin/PageController')
Route::resource('/subscribe', 'SubscribeController')->names('subscribe')->only('store');

/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/


/*-----------------AUTH ROUTES GROUPES--------------------------------------------------------------------------------------------------------------*/
Route::group(['middleware'=>['auth']], function(){

    // Wishlist Controllers---------
    Route::post('/wishlist/{item}', 'WishlistController@store')->name('wishlist.store');
    Route::get('/wishlist/count', 'WishlistController@count')->name('wishlist.count');
    Route::get('/wishlist/get', 'WishlistController@getData')->name('wishlist.get');
    Route::delete('/wishlist/unlike/{item}', 'WishlistController@unlike')->name('wishlist.unlike');
    Route::resource('/wishlist', 'WishlistController')->names('wishlist')->only(['index', 'destroy']);
    // --------------

    // Cart Controllers----------------------
    Route::get('/cart', 'CartController@index')->name('cart.index');
    Route::post('/cart/create', 'CartController@create')->name('cart.create');
    Route::post('/cart/update/', 'CartController@update');
    Route::get('/cart/count', 'CartController@count')->name('cart.count');
    Route::get('/cart/get', 'CartController@getData')->name('cart.get');
    Route::post('/cart/destroy', 'CartController@destroy')->name('cart.destroy');
    Route::post('/cart/unlike/{id}', 'CartController@unlike')->name('cart.unlike');
    //------------------------------------------------------------------------

    // Profile---------------------------------------------------
    Route::get('/profile', 'ProfileController@index')->name('profile.index');
    Route::get('/profile/address', 'ProfileController@address')->name('profile.address');
    Route::post('/profile/address', 'ProfileController@addressCreate')->name('profile.address.create');
    Route::post('/profile/address/update/{address}', 'ProfileController@addressUpdate')->name('profile.address.update');
    Route::delete('/profile/address/remove/{address}', 'ProfileController@addressRemove')->name('profile.address.destroy');
    // Route::post('/profile/address/create/payment', 'ProfileController@addressCreateByPayment');
    Route::get('/profile/password', 'ProfileController@password')->name('profile.password');
    Route::post('/profile/password', 'ProfileController@passwordUpdate')->name('profile.password.update');
    Route::get('/profile/history', 'ProfileController@history')->name('profile.history');
    // --------------------------------------------------------------------

    Route::post('/notification/packer/', 'NotificationController@packer')->name('notification.packer');

    Route::post('/rate/add', 'IndexController@add_rate')->name('rate.add');
    Route::get('/review/{companyId}', 'ReviewController@show')->name('review.show');
    Route::post('/review/store', 'ReviewController@store')->name('review.store');

    Route::get('checkout/{orderId}', 'CheckoutController@show')->name('checkout.show')->middleware('phoneVerified');
    Route::get('checkout/{orderId}/success', 'CheckoutController@success')->name('checkout.success');
    Route::post('checkout/update/order', 'CheckoutController@updateOrderByUser');


    // Companies controllers
    Route::resource('boutique', 'BoutiqueController')->names('boutique')->only(['show', 'index']);
});

/*------------------------------------------------------------------------------------------------------------------------------------------------*/


/*  -----------------------------------------------------------------------------------------------
------------------------ADMIN GROUP ROUTES------------------------------------------------------------------------------------------  */

Route::group(['middleware'=>['auth', 'admin'], 'namespace'=>'Admin', 'prefix'=>'admin'], function(){
    Route::resource('users', 'UserController')->names('admin.user');
    Route::resource('category', 'CategoryController')->names('admin.category');
    Route::resource('company', 'CompanyController')->names('admin.company')->except('store');
    Route::resource('page', 'PageController')->names('admin.page')->parameters([
        'page' => 'page:slug',
    ])->except("show");
    Route::get('/reviews', 'ReviewController@index')->name("review.index");
    Route::delete('/reviews/{review}', 'ReviewController@destroy')->name("review.destroy");
});
// Пока не разобрался с доступом либо для админа либо для продавца
Route::post('company', 'Admin\CompanyController@store')->name('admin.company.store')->middleware(['auth']);
/*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/


/*-------------SALE GROUP ROUTES--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
Route::group(['middleware'=>['auth', 'seller'], 'namespace'=>'Sale', 'prefix'=>'company'], function(){
    Route::resource('items', 'ItemController')->names('seller.items');
    Route::resource('gallery', 'GalleryController')->names('seller.gallery');
    Route::get('profile', 'CompanyController@index')->name('seller.company.dashboard');
    Route::get('profile/edit/', 'CompanyController@edit')->name('seller.company.edit');
    Route::post('profile/update', 'CompanyController@update')->name('seller.company.profile.update');

    Route::get('user/profile', 'UserController@profile')->name('seller.user.profile');
    Route::get('user/profile/edit', 'UserController@edit')->name('seller.user.edit');
    Route::get('/sales/live', 'SellerController@live')->name('seller.live');
    // Route::get('products', 'SellerController@products')->name('seller.products');
        /** Беру категории для селекта */
    // Route::get('/category/{id}', 'CategoryController@showChildren')->name('category.show');
});
/*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/


/*-------------PACKER GROUP ROUTES--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

Route::group(['middleware'=>['auth', 'packer'], 'namespace'=>'Packer', 'prefix'=>'packer'], function(){
    Route::get('/', 'PackerController@index')->name('packer.index');
    Route::get('history', 'PackerController@history')->name('packer.history');
    Route::post('order/accept', 'PackerController@accept')->name('packer.accept');
    Route::get('order/accept/{id}', 'PackerController@order')->name('packer.order');
    Route::post('order/available', 'PackerController@available')->name('packer.orders');
    Route::post('order/delivery/{order}', 'PackerController@delivery')->name('packer.delivery');
    Route::get('order/current', 'PackerController@current')->name('packer.current');
});
/*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*-------------DELIVERY GROUP ROUTES--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
Route::group(['middleware'=>['auth', 'delivery'], 'namespace'=>'Delivery', 'prefix'=>'delivery'], function(){
    Route::get('/', 'DeliveryController@index')->name('delivery.index');
    Route::post('order/accept', 'DeliveryController@accept')->name('delivery.accept');
    Route::get('history', 'DeliveryController@history')->name('delivery.history');
    Route::get('order/accept/{id}', 'DeliveryController@order')->name('delivery.order');
    Route::post('order/end/{order}', 'DeliveryController@end')->name('delivery.end');
    Route::post('/order/available', 'DeliveryController@available')->name('delivery.orders');
    Route::get('order/current', 'DeliveryController@current')->name('delivery.current');
});

/*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

Route::get('/user', 'User\UserController@index')->name('User')->middleware(['auth', 'user']);

// Route::get('/catalog', 'CatalogController@index')->name('catalog.index');
Route::get('/catalog/{category?}', 'Defaults\CatalogController@index')->name('catalog.index');
Route::get('/bazar/{page:slug}', '\App\Http\Controllers\Admin\PageController@show')->name('page.show');

Route::get('test', 'TestController@index2');
Route::post('test2', 'TestController@storeCompany')->name('test.store.company')->middleware(['auth']);
