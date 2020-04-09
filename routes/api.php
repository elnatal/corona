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

Route::get('caseRecord', 'CaseRecordController@index');

Route::get('contact', 'ContactController@index');
Route::post('contact', 'ContactController@store');

Route::get('emergency-contacts', 'EmergencyContactController@index');

Route::get('news', 'NewsController@index');

Route::get('device/{phone}', 'DeviceController@show');
Route::post('register', 'DeviceController@store');