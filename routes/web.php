<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/')->namespace('AdminArea')->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::prefix('/tickets')->group(function () {

        Route::get('/', 'TicketController@index')->name('tickets.all');
        Route::get('/create', 'TicketController@create')->name('tickets.create');
        Route::post('/store', 'TicketController@store')->name('tickets.store');
        Route::get('/{id}/view', 'TicketController@view')->name('tickets.view');
        Route::post('/reply/store', 'TicketController@replyStore')->name('tickets.reply.store');
        Route::get('/{id}/status', 'TicketController@status')->name('tickets.status');

    });

});

Route::prefix('/')->namespace('PublicArea')->group(function () {

    Route::prefix('/customer-tickets')->group(function () {
        Route::get('/', 'CustomerTicketController@index')->name('customer-tickets.all');
        Route::post('/store', 'CustomerTicketController@store')->name('customer-tickets.store');

    });

});