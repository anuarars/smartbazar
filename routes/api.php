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

    // Wishlist APIs
    Route::get('wishlists', 'WishlistController@index');
    Route::post('wishlists', 'WishlistController@store');
    Route::delete('wishlists', 'WishlistController@destroy');
    Route::get('wishlists/count', 'WishlistController@count');

    // Cart APIs
    Route::apiResource('carts', 'CartController')->except('show');

    Route::get('/carts/count', 'CartController@count');
    Route::post('/cart/unlike/{id}', 'CartController@unlike');

});

Route::group(['namespace' => 'Api'], function(){
    Route::get('products', 'ProductController@index');
    Route::get('categories/', 'CategoryController@index');
    Route::apiResource('items', 'ItemController');

});
