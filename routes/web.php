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

Auth::routes();

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::get('/news', 'NewsController@index')->name('news');
    Route::get('/news/add', 'NewsController@create')->name('add-news');
    Route::post('/news', 'NewsController@store')->name('store-news');
    Route::get('/news/{id}', 'NewsController@edit')->name('edit-news');
    Route::post('/news/{id}', 'NewsController@update')->name('update-news');
    Route::delete('/news/{id}', 'NewsController@destroy')->name('delete-news');


    Route::get('/emergency-contact', 'EmergencyContactController@index')->name('emergency-contact');
    Route::get('/emergency-contact/add', 'EmergencyContactController@create')->name('add-emergency-contact');
    Route::post('/emergency-contact', 'EmergencyContactController@store')->name('store-emergency-contact');
    Route::get('/emergency-contact/{id}', 'EmergencyContactController@edit')->name('edit-emergency-contact');
    Route::post('/emergency-contact/{id}', 'EmergencyContactController@update')->name('update-emergency-contact');
    Route::delete('/emergency-contact/{id}', 'EmergencyContactController@destroy')->name('delete-emergency-contact');

    Route::get('/devices', 'DeviceController@index')->name('devices');
    Route::post('/devices/{id}', 'DeviceController@update')->name('update-device');
    
    Route::get('/tracker', 'DeviceController@tracker')->name('tracker');
    
    Route::get('/search', 'DeviceController@search')->name('search');
    Route::get('/contact/{id}', 'ContactController@contact')->name('contact');
    Route::get('/heatmap', 'ContactController@heatmap')->name('heatmap');
});
