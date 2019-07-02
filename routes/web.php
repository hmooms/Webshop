<?php
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
Route::get('/', function()
{
    return redirect('/store');
});

Route::resource('/store', 'ProductController');
Route::resource('/category', 'CategoryController');

Route::post('/add', 'ShoppingcartController@addToCart')->name('add');
Route::post('/remove', 'ShoppingcartController@removeFromCart')->name('remove');
Route::get('/cart', 'ShoppingcartController@index')->name('shoppingcart');

Route::get('/buy', 'OrderDetailsController@store')->name('buy');
Route::get('/orders', 'OrderDetailsController@index')->name('orders');
Route::get('/order/{id}', 'OrderDetailsController@show')->name('showOrder');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
