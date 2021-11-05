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
Route::prefix('profile')->group(function () {
    Route::get('/', 'ProfileController@index')->name('profile');
    Route::put('/', 'ProfileController@update')->name('profile.update');
});

Route::get('/about', function () {
    return view('about');
})->name('about');


//Customers
Route::prefix('customers')->group(function () {
    Route::get('/', 'CustomersController@index')->name('customers');
    Route::get('/show', 'CustomersController@show')->name('cust-show');
    Route::get('/create', 'CustomersController@create')->name('cust-create');
    Route::get('/create/{id}', 'CustomersController@create')->name('cust-create');
    Route::get('/edit/{id}', 'CustomersController@edit')->name('cust-edit');
});

//Subscriptions
Route::prefix('subscriptions')->group(function () {
    Route::get('/', 'SubscriptionsController@index')->name('subscriptions');
    Route::get('/create', 'SubscriptionsController@create')->name('subscriptions.create');
    Route::post('/create', 'SubscriptionsController@store')->name('subscriptions.store');
    Route::get('/details/{id}', 'SubscriptionsController@createDetails')->name('subscriptions.details');
    Route::post('/details', 'SubscriptionsController@storeDetails')->name('subscriptions.storedetails');
    Route::get('/quotations/{id}', 'SubscriptionsController@createQuotations')->name('subscriptions.quotations');
    Route::post('/quotations', 'SubscriptionsController@storeQuotations')->name('subscriptions.storequotations');
    Route::get('/show/{id}', 'SubscriptionsController@show')->name('subscriptions.show');
});


//Services
Route::prefix('services')->group(function () {
    Route::get('/', 'ServicesController@index')->name('services');
    Route::get('/create', 'ServicesController@create')->name('services.create');
    Route::put('/create', 'ServicesController@store')->name('services.store');
    Route::put('/edit/{id}', 'ServicesController@edit')->name('services.edit');
});

Route::prefix('daily_activity')->group(function () {
    Route::get('/','DailyActivityController@index')->name('daily_activity');
    Route::get('/create','DailyActivityController@create')->name('daily_activity.create');
    Route::post('/create','DailyActivityController@store')->name('daily_activity.store');
    // Route::get('/edit/{id}','DailyActivityController@edit')->name('daily_activity.edit');
});