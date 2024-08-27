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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function(){ //!!!route('login')
    return redirect(route('login'));
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::middleware('auth')->group(function () {

Route::get('/home', 'ShopController@index')->name('home');
Route::get('/link-change-password', 'Auth\ForgotPasswordController@linkChangePassword')->name('link-change-password');
Route::post('/change-password', 'Auth\ForgotPasswordController@changePassword')->name('change-password');
 
Route::get('/product/{id}', 'ShopController@product')->name('product');
Route::get('/product/{id}/comment', 'ShopController@comment')->name('comment');
Route::post('/addcomment', 'ShopController@addcomment')->name('addcomment');
Route::post('/removecomment', 'ShopController@removecomment')->name('removecomment');

Route::get('/cart', 'ShopController@cart')->name('cart');
Route::post('/tocart', 'ShopController@tocart')->name('tocart');
Route::post('/clearall', 'ShopController@clearall')->name('clearall');
Route::post('/clearone', 'ShopController@clearone')->name('clearone');
Route::post('/mailer', 'ShopController@mailer')->name('mailer');
});

Route::middleware('admin')->group(function () {
Route::get('/dashboard', 'AdminController@index')->name('dashboard');
Route::name('users')->resource('users', 'AdminController'); //!!!resource - users
});