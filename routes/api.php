<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('register', 'Api\RegisterController@register');
// Route::post('login', 'Api\LoginController@login');

Route::group(['middleware' => 'api','prefix' => 'auth','namespace' => 'Api'], function () {
    Route::post('login', 'AuthController@login')->name('api.login');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::get('pusher/beams-auth', 'AuthController@beams');
    Route::post('verify/code', 'AuthController@verify');
    Route::post('verify/resend', 'AuthController@resend');
    Route::post('verify/reset', 'AuthController@reset');

    // Cart APIs
    Route::apiResource('carts', 'CartController')->only('store', 'index');
    Route::post('carts/update', 'CartController@update');
    Route::delete('carts', 'CartController@destroy');
    Route::get('carts/count', 'CartController@count');

    // Wishlist APIs
    Route::post('wishlist/{item}', 'WishlistController@store');
    Route::get('wishlist/count', 'WishlistController@count');
    Route::get('wishlists', 'WishlistController@index');
    Route::delete('wishlist/{wishlist}', 'WishlistController@destroy');
    Route::delete('wishlist/unlike/{item}', 'WishlistController@unlike');

    // Orders
    Route::get('orders', 'OrderController@index');
    Route::get('orders/status', 'OrderController@status');
});

Route::group(['namespace' => 'Api'], function(){
    Route::get('products', 'ProductController@index');
    Route::get('categories/', 'CategoryController@index');
    Route::apiResource('items', 'ItemController')->names('api.items');
    Route::apiResource('companies', 'BoutiqueController')->only('index', 'show');
    Route::apiResource("pages", 'PageController')->only('index', 'show');
    Route::get('companies/{company}/items', 'BoutiqueController@showItems')->name('api.boutique.items');
});
