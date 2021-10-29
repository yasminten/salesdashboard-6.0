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
Route::get('/customers', 'CustomersController@index')->name('customers');
Route::get('/customers/show', 'CustomersController@show')->name('cust-show');
Route::get('/customers/create', 'CustomersController@create')->name('cust-create');

Route::get('/customers/edit', 'CustomersController@edit')->name('cust-edit');


//Subscriptions
Route::get('/subscriptions', 'SubscriptionsController@index')->name('subscriptions');
Route::get('/subscriptions/create', 'SubscriptionsController@create')->name('subscriptions.create');
Route::put('/subscriptions/create', 'SubscriptionsController@create')->name('subscriptions.store');
Route::get('/subscriptions/show/{id}', 'SubscriptionsController@show')->name('subscriptions.show');



//Services
Route::get('/services', 'ServicesController@index')->name('services');
Route::get('/services/create', 'ServicesController@create')->name('services.create');
Route::put('/services/create', 'ServicesController@store')->name('services.store');
Route::put('/services/edit/{id}', 'ServicesController@edit')->name('services.edit');



