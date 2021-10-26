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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Profile
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');


//Customers
Route::get('/customers', 'CustomersController@index')->name('customer');
Route::get('/customers/show', 'CustomersController@show')->name('cust-show');
Route::get('/customers/edit', 'CustomersController@edit')->name('cust-edit');


//Subscriptions
Route::get('/subscriptions', 'SubscriptionsController@index')->name('subscriptions');

//Services
Route::get('/services', 'ServicesController@index')->name('services');

