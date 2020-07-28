<?php

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

Route::get('/',[
    'uses'=> 'PagesController@index',
    'as' => 'product.index',
    'middleware' => 'guest'
]);

Route::get('/shop',[
    'uses'=>'ProductController@getIndex',
    'middleware' => 'auth',
    'as' => 'product.shop'
]);


/*Route::get('/admin',[
    'uses'=>'PagesController@admin',
    'middleware' => 'auth'
]);
*/


Route::get('/edit', [
    'uses'=>'UserController@edit',
    'as'=>'user.edit',
    'middleware' => 'auth'
]);
Route::get('/change', [
    'uses'=>'UserController@show',
    'as'=>'user.show'
    ]);
Route::get('/orders',[
    'uses' => 'UserController@getOrders',
    
]);
Route::post('/edit', 'UserController@update')->name('user.update');
Route::post('/change', 'UserController@change')->name('user.change');

Route::get('/add-to-cart/{id}', [
    'uses' => 'ProductController@getAddToCart',
    'as' => 'product.addToCart'
]);
Route::get('/reduce/{id}', [
    'uses' => 'ProductController@getReduceByOne',
    'as' => 'product.reduceByOne'
]);
Route::get('/remove/{id}', [
    'uses' => 'ProductController@getRemoveItem',
    'as' => 'product.remove'
]);
Route::get('/shopping-cart', [
    'uses' => 'ProductController@getCart',
    'as' => 'product.shoppingCart'
]);
Route::get('/checkout', [
    'uses' => 'ProductController@getCheckout',
    'as' => 'checkout'
]);
Route::post('/checkout', [
    'uses' => 'ProductController@postCheckout',
    'as' =>   'checkout'  
]);

Route::get('/report',[
    'uses'=> 'ReportController@index',

]);
Route::get('/make', [
    'uses' => 'AdminController@make',
]);
Route::post('/make', [
    'uses' => 'AdminController@postMake',
    'as' => 'make',
]);

Route::get('/complete-registration', 'Auth\RegisterController@completeRegistration');

Route::post('/2fa', function () {
    return redirect(URL()->previous());
})->name('2fa')->middleware('2fa');

Auth::routes();
Route::resource('/admin', 'AdminController');

Route::get('/home', 'HomeController@index');
